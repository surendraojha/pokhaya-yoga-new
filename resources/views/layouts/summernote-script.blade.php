<script>
    $(document).ready(function() {
        const summernoteElement = $('.summernote, #summernote'); // Select your Summernote target(s)

        summernoteElement.summernote({
            height: 300,
            minHeight: null,
            maxHeight: null,
            focus: true,
            callbacks: {
                onImageUpload: function(files) {
                    console.log('onImageUpload called');
                    for (let i = 0; i < files.length; i++) {
                        uploadImage(files[i]);
                    }
                },
                onPaste: function(e) {
                    console.log('onPaste called');
                    var clipboardData = e.originalEvent.clipboardData;
                    if (clipboardData && clipboardData.items) {
                        for (var i = 0; i < clipboardData.items.length; i++) {
                            if (clipboardData.items[i].type.indexOf('image') !== -1) {
                                uploadImage(clipboardData.items[i].getAsFile());
                                e.preventDefault();
                            }
                        }
                    }
                },
                // *** REMOVE the onMediaDelete callback here ***
                // onMediaDelete: function(target) { ... }
            }
        });

        // --- NEW: MutationObserver for YouTube embeds ---
        // Get the editable content div of Summernote
        const summernoteEditable = summernoteElement.next('.note-editor').find('.note-editable')[0];

        if (summernoteEditable) {
            const observer = new MutationObserver(mutations => {
                for (let mutation of mutations) {
                    if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                        mutation.addedNodes.forEach(node => {
                            // Check if the added node is an iframe or contains an iframe
                            if (node.tagName === 'IFRAME' || (node.querySelector && node.querySelector('iframe'))) {
                                const iframe = node.tagName === 'IFRAME' ? $(node) : $(node).find('iframe');

                                if (iframe.length) { // Ensure an iframe was found
                                    const iframeSrc = iframe.attr('src');
                                    console.log('MutationObserver: Found a new iframe with src:', iframeSrc);

                                    const youtubeVideoId = getYouTubeId(iframeSrc);
                                    console.log('MutationObserver: Extracted YouTube ID:', youtubeVideoId);

                                    if (youtubeVideoId) {
                                        // 1. Remove the original iframe
                                        iframe.remove();
                                        console.log('MutationObserver: Original iframe removed.');

                                        // 2. Construct the lite-youtube-embed custom element HTML
                                        const liteYoutubeHtml = `
                                            <lite-youtube videoid="${youtubeVideoId}"
                                                title="YouTube video player"
                                                params="autoplay=1&rel=0&modestbranding=1"
                                                class="note-video-clip" style="width: 100%; max-width: 640px; height: auto;">
                                            </lite-youtube>
                                        `;
                                        // 3. Insert our custom element at the location of the removed iframe
                                        // This can be tricky. We need to insert it where the cursor was or where the iframe was.
                                        // For simplicity, we can insert it at the end of the current block or the editor.
                                        // A more advanced solution might try to capture the exact insertion point.
                                        // For now, let's append it or insert it where the cursor last was if possible.
                                        // A common way to get it into the right place for Summernote is:
                                        $('#summernote').summernote('pasteHTML', liteYoutubeHtml);
                                        console.log('MutationObserver: Lite YouTube embed inserted.');
                                    }
                                }
                            }
                        });
                    }
                }
            });

            // Start observing the Summernote editable area for changes
            observer.observe(summernoteEditable, {
                childList: true, // Watch for direct children added/removed
                subtree: true,   // Watch for changes in the entire subtree
            });

            console.log('MutationObserver started on Summernote editable area.');
        } else {
            console.error('Summernote editable area not found for MutationObserver. Check your selector.');
        }

        // --- Your existing uploadImage function ---
        function uploadImage(file) {
            let data = new FormData();
            data.append("image", file);
            data.append("_token", "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('admin.blog.uploadImage') }}",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(response) {
                    if (response.url) {
                        const imgNode = $('<img>').attr('src', response.url).attr('loading', 'lazy').addClass('img-fluid');
                        if (response.width && response.height) {
                            imgNode.attr('width', response.width).attr('height', response.height);
                        }
                        $('#summernote').summernote('insertNode', imgNode[0]);
                        console.log('Image inserted with lazy loading:', response.url);
                    } else {
                        alert('Error uploading image: ' + (response.message || 'Unknown error. Check console.'));
                        console.error('Image upload response missing URL:', response);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    let errorMessage = 'Image upload failed.';
                    try {
                        let responseJson = JSON.parse(jqXHR.responseText);
                        if (responseJson.message) {
                            errorMessage += '\n' + responseJson.message;
                        } else if (responseJson.errors) {
                            for (let key in responseJson.errors) {
                                errorMessage += '\n' + responseJson.errors[key].join(', ');
                            }
                        }
                    } catch (e) {
                        errorMessage += '\n' + errorThrown;
                    }
                    console.error("Image upload failed:", textStatus, errorThrown, jqXHR.responseText, jqXHR);
                    alert(errorMessage);
                }
            });
        }

        // --- Helper function to extract YouTube ID ---
        function getYouTubeId(url) {
            if (!url) return null;
            const regex = /(?:https?:\/\/)?(?:www\.)?(?:m\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=|embed\/|v\/|)([\w-]{11})(?:\S+)?/;
            const match = url.match(regex);
            return (match && match[1]) ? match[1] : null;
        }
    });
</script>
