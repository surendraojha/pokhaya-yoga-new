<div id="ytLightbox" onclick="closeYtLightbox(event)"
    style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,.85);align-items:center;justify-content:center;">
    <div style="position:relative;width:90%;max-width:860px;aspect-ratio:16/9;">
        <button onclick="closeYtLightbox(null,true)"
            style="position:absolute;top:-40px;right:0;background:none;border:none;color:#fff;font-size:2rem;cursor:pointer;line-height:1;">&times;</button>
        <iframe id="ytLightboxIframe" src="" width="100%" height="100%" style="border:none;border-radius:8px;"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
</div>

<script>
    const ytLightbox = document.getElementById('ytLightbox');
    const ytIframe = document.getElementById('ytLightboxIframe');

    function openYtLightbox(el) {
        ytIframe.src = el.dataset.embed;
        ytLightbox.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeYtLightbox(event, force = false) {
        if (force || event.target === ytLightbox) {
            ytIframe.src = '';
            ytLightbox.style.display = 'none';
            document.body.style.overflow = '';
        }
    }
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeYtLightbox(null, true);
    });
</script>
