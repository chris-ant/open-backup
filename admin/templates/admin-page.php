<div class="wrap">
<script>

window.addEventListener('DOMContentLoaded', (event) => {
    // Get the current URL
    let currentUrl = window.location.href;
    
    // Check if the URL contains the specific query parameter
    if (currentUrl.includes('&settings-updated=true')) {
        // Remove the specific query parameter
        let newUrl = currentUrl.replace('&settings-updated=true', '');
        
        // Update the URL in the browser without reloading the page
        history.replaceState(null, '', newUrl);
    }
});


</script>
<h2>Open Backup</h2>
<form action="options.php" method="post">
    <?php 
    settings_errors();
    settings_fields('obk_plugin_options_group');
    do_settings_sections('obk_plugin_main');
    submit_button('Save Changes', 'primary');
    ?>
</form>
</div>
