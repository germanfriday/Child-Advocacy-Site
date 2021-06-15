<span class="boldtext">1. How do I installed eNews onto my wordpress blog? </span>
<div class="indent">
  <p>There are several files included in the ZIP folder. These include wordpress theme files, plugin files, and photoshop files. To installed your wordpress theme you will first need to upload the theme/plugin files via FTP to your server. </p>
  <p>First you are going to upload the theme folder. Inside the ZIP folder you downloaded you will see a folder named "theme." Within it is a folder named "eNews." Via ftp, upload the "eNews" folder to your Wordpress themes directory. Depending on where you installed Wordpress on your server, the wp themes folder will be located in a path similar to: /public_html/blog/wp-content/themes. </p>
  <p>Next you need to upload the plugin files. This particular theme does not require any plugins, so you can skip this step.</p>
  <p>Next you need to select eNews and make it your default theme. Click on the design link, and under the themes tab locate eNews from the selection of themes and activate it. Your blog should now be updated with your new theme. </p>
  <p>Finally, once the theme has been activated, you should navigate to the Appearances > eNews Theme Options page. Here you can adjust settings pertaining to theme's display. Once you have adjusted whatever settings you would like to change click the "save" button. You must click the "save" button for the options to be saved to the database. Even if you did not change anything you should click the save button once before using the theme to insure that the database has been written correctly.</p>
</div>
<span class="boldtext">2. How do I add the thumbnails to my posts? </span>
<div class="indent">
  <p>eNews utilizes a script called TimThumb to automatically resize images. Whenever you make a new post you will need to add a custom field. Scroll down below the text editor and click on the "custom fields" link. In the "Name" section, input "Thumbnail" (this is case sensitive). In the "Value" area, input the url to your thumbnail image. Your image will automatically be resized and cropped. The image must be hosted on your domain. (this is to protect against bandiwdth left) </p>
  <p><span class="style1">Important Note: You <u>must</u> CHMOD the "cache" folder located in the eNews directory to 777 for this script to work. You can CHMOD (change the permissions) of a file using your favorite FTP program. If you are confused try following <a href="http://www.siteground.com/tutorials/ftp/ftp_chmod.htm" target="_blank"><u>this tutorial</u></a><u>.</u> Of course instead of CHMODing the template folder (as in the tutorial) you would CHMOD the "cache" folder found within your theme's directory. </span></p>
</div>
<span class="boldtext">3. How do I add my title/logo? </span>
<div class="indent"><p>In this theme the title/logo is an image, which means you will need an image editor to add your own text. You can do this by opening the blank logo image located at Photoshop Files/logo_blank.gif, or by opening the logo PSD file located at Photoshop Files/logo.psd. Replace the edited logo with the old logo by placing it in the following directory: theme/eNews/images. If you need more room, or would like to edit the logo further, you can always do so by opening the original fully layered PSD file located at Photoshop Files/eNews.psd</p></div>

<span class="boldtext">4. How do I manage advertisements on my blog? </span>
<div class="indent"><p>You can change the images used in each of the advertisements, as well as which URL each ad points to, through the custom option pages found in wp-admin. Once logged in to the wordpress admin panel, click "Design" and then "Current Theme Options" to reveal the various theme options.</p></div>

<span class="boldtext">5. How do I setup the Featured Articles on the homepage? </span>
<div class="indent">
  <p>You can set up your featured articles within the eNews Theme Options page. Here you can choose which category to use as your featured articles category, as well as adjust several settings pertaining to the article slider.</p></div>