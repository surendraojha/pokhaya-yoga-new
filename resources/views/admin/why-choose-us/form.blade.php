<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'summernote']) }}
</div>

{{-- Template Reference --}}
<div class="alert alert-info mt-3">
    <strong>📋 HTML Template (copy and paste into editor's code view):</strong>
    <button class="btn btn-sm btn-secondary float-right"
            onclick="navigator.clipboard.writeText(document.getElementById('html-template').innerText); this.innerText='✅ Copied!'">
        Copy
    </button>
    <pre id="html-template" style="margin-top:10px; font-size:12px; white-space:pre-wrap;">&lt;p&gt;Your description here.&lt;/p&gt;

&lt;div class="row"&gt;
  &lt;div class="col-12 col-sm-12 col-md-6 col-lg-6"&gt;
    &lt;ul&gt;
      &lt;li&gt;&lt;i class="fa-solid fa-circle-arrow-right"&gt;&lt;/i&gt; Point one&lt;/li&gt;
      &lt;li&gt;&lt;i class="fa-solid fa-circle-arrow-right"&gt;&lt;/i&gt; Point two&lt;/li&gt;
    &lt;/ul&gt;
  &lt;/div&gt;
  &lt;div class="col-12 col-sm-12 col-md-6 col-lg-6"&gt;
    &lt;ul&gt;
      &lt;li&gt;&lt;i class="fa-solid fa-circle-arrow-right"&gt;&lt;/i&gt; Point three&lt;/li&gt;
      &lt;li&gt;&lt;i class="fa-solid fa-circle-arrow-right"&gt;&lt;/i&gt; Point four&lt;/li&gt;
    &lt;/ul&gt;
  &lt;/div&gt;
  &lt;div class="col-6 col-md-3"&gt;
    &lt;img src="IMAGE_URL" alt="" style="width:100%;"&gt;
  &lt;/div&gt;
  &lt;div class="col-6 col-md-3"&gt;
    &lt;img src="IMAGE_URL" alt="" style="width:100%;"&gt;
  &lt;/div&gt;
  &lt;div class="col-6 col-md-3"&gt;
    &lt;img src="IMAGE_URL" alt="" style="width:100%;"&gt;
  &lt;/div&gt;
  &lt;div class="col-6 col-md-3"&gt;
    &lt;img src="IMAGE_URL" alt="" style="width:100%;"&gt;
  &lt;/div&gt;
&lt;/div&gt;</pre>
</div>

<input type="submit" value="save" class="btn btn-success">
