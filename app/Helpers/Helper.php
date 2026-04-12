<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Models\Country;
use App\Models\EBasicInfo;
use App\Models\EmployerSubscription;
use App\Models\Job;
use App\Models\JsAcademicInformation;
use App\Models\JsBasicInfo;
use App\Models\JsJobPreference;
use App\Models\JsOtherInformation;
use App\Models\JSReference;
use App\Models\JsTraining;
use App\Models\JsWorkingExperience;
use Exception;
use Illuminate\Http\Request;
use Image;

class Helper
{
    public static function slug($slug)
    {
        $slug=strtolower($slug);
        $slug=str_replace("?","-",$slug);
        $slug=str_replace("/","-",$slug);
        $slug=str_replace("&","-",$slug);
        $slug=str_replace(",","-",$slug);


        return $slug;
    }
    
    
    
    public static function uploadImage($file, $path, $width,$height,$image_name=null)
    {

        // $baseName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        if(!$image_name) {
            $image_name = time() . '_' . rand() . '.webp';
        }


        $thumbnail = Image::make($file->getRealPath());
         $thumbnail->resize($width, $height, function ($constraint) {
             $constraint->aspectRatio();
         })->encode('webp', 85);;

        $thumbnail->save($path . $image_name);

         return $image_name;
    }
    
    public static function isSpamByAI(array $data): bool
{
    $prompt = "You are a spam detection assistant. Analyze this contact form submission. Respond only with 'Spam' or 'Not Spam'.\n\n";
    foreach ($data as $key => $value) {
        $prompt .= ucfirst($key) . ": " . $value . "\n";
    }

    $postData = [
        'model' => 'gpt-3.5-turbo',
        'temperature' => 0,
        'messages' => [
            ['role' => 'system', 'content' => 'You are a spam detection assistant. Respond only with "Spam" or "Not Spam".'],
            ['role' => 'user', 'content' => $prompt],
        ],
    ];

    $ch = curl_init('https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . env('OPENAI_API_KEY'),
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        curl_close($ch);
        \Log::error('Curl error: ' . curl_error($ch));
        return false; // fail gracefully
    }

    curl_close($ch);

    $result = json_decode($response, true);

    if (isset($result['choices'][0]['message']['content'])) {
        $classification = strtolower(trim($result['choices'][0]['message']['content']));
        return $classification === 'spam';
    }

    return false; // default to not spam if no proper response
}



public static function isSpamSubmission(
    Request $request,
    array $freeTextFields = [],
    array $phoneFields = [],
    ?string $nameField = null,
    ?string $emailField = null
): bool {
    // 1. CSRF should normally handle cross-site, but keep referer check as extra
    if (isset($_SERVER['HTTP_REFERER'])) {
        $refererDomain = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
        if ($refererDomain !== $_SERVER['HTTP_HOST']) {
            return true;
        }
    }

    // 2. Honeypot fields check
    if (!empty($request->website) || !empty($request->input('secret_field'))) {
        return true;
    }

    // 3. Check disposable/blacklisted email domains + spammy keywords
    if ($emailField && $request->filled($emailField)) {
        $email = strtolower($request->input($emailField));
        $emailParts = explode('@', $email);
        $domain = $emailParts[1] ?? '';

        $disposableDomains = [
            'mail.ru', 'yopmail.com', 'tempmail.com', 'mailinator.com',
            'hacked.com', 'hack.com'
        ];
        if (in_array($domain, $disposableDomains)) {
            return true;
        }

        // Domain must have MX record
        if ($domain && !checkdnsrr($domain, 'MX')) {
            return true;
        }

        $spamEmailKeywords = ['hack', 'hacked', 'hacking'];
        foreach ($spamEmailKeywords as $keyword) {
            if (stripos($email, $keyword) !== false) {
                return true;
            }
        }
    }

    // 4. Gibberish names
    // if ($nameField && $request->filled($nameField)) {
    //     $name = $request->input($nameField);
    //     if (preg_match('/[0-9]{3,}/', $name) ||
    //         preg_match('/[a-z]{5,}[A-Z]{3,}|[A-Z]{5,}[a-z]{3,}/', $name)) {
    //         return true;
    //     }
    // }

    // 5. Phone number validation (allow digits, optional +, and dashes)
    // foreach ($phoneFields as $phoneField) {
    //     if ($request->filled($phoneField)) {
    //         $phone = $request->input($phoneField);
    //         if (!preg_match('/^\+?[0-9\-]{7,20}$/', $phone)) {
    //             return true;
    //         }
    //     }
    // }

    // 6. Free-text spam keyword & link density check
    $spamKeywords = [ 'viagra', 'cialis',
        'loan', 'hack', 'hacked', 'hacking'
    ];

    foreach ($freeTextFields as $field) {
        if ($request->filled($field)) {
            $text = strtolower($request->input($field));

            // Keyword scan
            foreach ($spamKeywords as $keyword) {
                if (stripos($text, $keyword) !== false) {
                    return true;
                }
            }

            // Too many http links
            if (substr_count($text, 'http') > 2) {
                return true;
            }

            // Link density ratio
            $wordCount = str_word_count($text);
            if ($wordCount > 0) {
                $linkRatio = substr_count($text, 'http') / $wordCount;
                if ($linkRatio > 0.1) {
                    return true;
                }
            }
        }
    }

    // 7. Hidden JS honeypot timestamp
    // if ($request->has('form_ts')) {
    //     $ts = (int) $request->input('form_ts');
    //     if ($ts > 0 && (time() - $ts) < 2) { // submitted too quickly (<2s)
    //         return true;
    //     }
    // }

    return false;
}



    
  
}
