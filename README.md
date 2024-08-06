# open-backup
Open Backup - A free and open source WordPress plugin for backups and migrations. 

## Development Goals
* Wherever possible, use existing API's from WordPress. 
    * For settings, use wp_options
    * For storing backup schedules, use custom post types & post_meta
    * For saving backups remotely, use HTTP API
    * For cron, use default WordPress cron jobs
* The UI should be created from scratch.
    * The current WordPress admin experience is very fragmented and prone to issues. 
    * Various notifications, messages appear in the UI from other themes and plugins. 
    * Instead of using exising UI elements, create it from scratch by cloning the new FSE settings design
        * Allows for a curated experience for the end user while still remaining familiar. 
        * It should be done in PHP. HTMX & Javascript will be used for improving the flow of the app. 
        * This way we control the scripts, html & css needed for our CRUD app.
        * We remove any sort of bloat that's not needed.
* Technical Details
    * Where possible, limit the ammount of code we create. 
    * While we are using composer's autoloader, we can't use composer packages with our plugin because it opens the door for pottential conflicts.
        
