<?php include_once 'header.php' ?>

<div id="main">
    <h1><?php echo $title ?></h1>
    <ul class="form-wrapper">
        <form action="" method="POST">
            <li class="form-checkbox"><input type="checkbox" name="databaseonly" id="databaseonly"/> <label for="databaseonly">Database Only</label></li>
            <li class="form-textarea">
                <p>
                    <label for="excludedfolders">Excluded Folders</label>
                    <textarea name="excludedfolders" id="excludedfolders" rows="2" spellcheck="false">backup,updraft,wpallinoneimport</textarea>
                </p>
                <p class="form-description">A comma separated list of excluded folders to not be included in the archive.</p>
            </li>
            <li class="form-textarea">
                <p>
                    <label for="excludedfiletypes">Excluded File Types</label>
                    <textarea name="excludedfiletypes" id="excludedfiletypes" rows="2" spellcheck="false">zip,rar,gz,wpress</textarea>
                </p>
                <p class="form-description">A comma separated list of excluded file types to not be included in the archive.</p>
            </li>
            <li class="form-submit">
                <input type="submit" value="Generate Export">
            </li>
        </form>
    </ul>

    <!-- <p><?php echo $content_url; ?></p> -->
</div>

<?php include_once 'footer.php' ?>