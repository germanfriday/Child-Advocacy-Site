<p>Thank you very much for your interest in Kreativik Wordpress template. In this document, we will try to cover the installation and customization of the theme. If you encounter yourself having a trouble with something that is beyond the scope of this help file, please feel fry to use our support system at <a href="http://support.udesign.sk">support.udesign.sk</a>.</p>
<h3><em>Table of contents</em></h3>
<ol>
<li><a href="#install">Installation of the theme</a></li>
<li><a href="#pagestructure">Achieving the correct page structure</a></li>
<li><a href="#plugins">Setting up the plugins</a></li>
<li><a href="#bb">Working with billboard</a></li>
<li><a href="#featureds">Customizing featured services</a></li>

<li><a href="#homep">Setting up the homepage, different variations of homepages</a></li>
<li><a href="#portf">Setting up the portfolio</a></li>
<li><a href="#chback">Changing the backgrounds</a></li>
<li><a href="#apages">Adding pages</a></li>
<li><a href="#fullw">How to add a full-width page?</a></li>
<li><a href="#aposts">Adding posts</a></li>
<li><a href="#imgb">How do I add an Image to the blog post excerpt?</a></li>
</ol>
<h4 id="install">Installation of the theme</h4>

<p>If you want to install <strong>Kreativik for wordpress</strong> properly on your server:</p>
<ol>
<li>First of all, your server should support PHP. You will also need an installation of Wordpress. If you allredy dont have one, download it from <a href="http://wordpress.org/">here</a> and follow instructions on wordpress site to install it correctly.</li>
<li>If you have a running installation of wordpress, place the theme files from download into &#8220;themes&#8221; folder. The path to this folder should be something like <em>http://yourdomain.com/wp-content/themes/</em>. Make sure that all theme files (without PSDs and help files !) are in the separate folder called &#8220;kreativik&#8221;. The path to the theme files should be <em>http://yourdomain.com/wp-content/themes/kreativik</em> upon completition of this step.</li>

<li>Enter you Wordpress Admin Interface. It should be available at <em>http://yourdomain.com/wp-admin</em>.</li>
<li>In the left menu, find <strong>appearance</strong> tab. Click it. Submenu should appear. Click <strong>themes</strong>.</li>
<li>Next screen should show all of your installed themes. Find <strong>kreativik 1.0 by uDesignStudios</strong>.</li>
<li>Click <strong>Activate</strong>.</li>

</ol>
<p>Congratulations! You&#8217;ve just successfully installed <strong>Kreativik for wordpress on your server!</strong></p>
<h4 id="pagestructure">Achieving the correct page structure</h4>
<p>One of the most common question that we have to answer over and over is: <strong><em>How do I achieve the same structure of homepage, blog page etc on my server as it is shown in your live preview?</em></strong>. If this is your case, read the following instructions carefully.</p>
<ol>
<li>Login to your wordpress admin interface</li>
<li>In the left menu, click <strong>settings</strong>, then <strong>reading</strong>.</li>

<li> For <em>Front page displays</em>, select <strong>static page</strong>.</li>
<li>If you haven&#8217;t already added page titled &#8220;home&#8221; yet, do it now <strong>(pages &gt;&gt; add new)</strong></li>
<li>Pick <strong>&#8220;home&#8221;</strong> from the first drop down list.</li>

<li>Pick <strong>&#8220;blog&#8221;</strong> from the second dropdown list.</li>
</ol>
<p>This way, your homepage will show no posts whatsoever, (except if you switch it that way via advanced admin option, we will get to it), and your posts will appear under separate &#8220;blog&#8221; page. Pretty neat. Now, lets move on to some more interesting stuff.</p>
<h4 id="plugins">Setting up the plugins</h4>
<p>This themes uses two plugins, WP125 and cforms. They are not, for obvious reasons, redistributed with the theme itself, but they are available for free on the internet. You can get WP125 <a href="http://wordpress.org/extend/plugins/wp125/">here</a>. cForms is available <a href="http://www.deliciousdays.com/cforms-plugin">here.</a></p>

<h5>WP125 Plugin</h5>
<p>WP125 Plugin manages your 125&#215;125 adverts in sidebar. It is a really nice plugin, with a lot of features, like click trackings, displaying ads for limited time only etc. To install it, do following:</p>
<ol>
<li>Download the WP125 Plugin from the link above</li>
<li>Copy the downloaded files into your plugins folder <em>(http://yourdomain.com/wp-content/plugins)</em></li>
<li>Enter Wordpress Admin interface</li>
<li>Select <strong>Plugins</strong> from the left menu</li>

<li>Take a look at the list of available plugins, find WP125, and click <strong>Activate</strong></li>
</ol>
<p>Good job! WP125 Installed. However, we still have to set up a few things to make it work the way we want. But dont, worry. We are almost there.</p>
<ol>
<li>Take a look at left menu in your wp admin, especially the bottom part. There should be new Item called <strong>Ads</strong>. Click it.</li>
<li>Select <strong>settings</strong> from ads submenu. You should see a list of settings for WP125. For our purpose, the most important are: <strong>Number of Ad Slots</strong>, <strong>Widget Titles</strong>, <strong>Ad Sales Page</strong> and <strong>Default Ad</strong>.</li>

<li><strong>Number of slots:</strong> This is the total number of square ads displayed in your sidebar. In our preview, we use 4, but feel free to add as many as you wish.</li>
<li><strong>Widget Titles:</strong> This is the title of the whole widget, the heading. In our live preview, we use &#8220;Our partners&#8221;.</li>
<li><strong>Ad sales Page:</strong> If you have special page with ads pricing and policy, you can put url link to it here. Available slots without Ad will link to that page</li>
<li><strong>Default Ad:</strong> This is the image that is shown at the slots with no ad. Again, to change it, put url of a new image into the field</li>

</ol>
<p>Those were the general settings. Now, lets take a look at how we actually add the ads.</p>
<ol>
<li>Go to <strong>Ads -&gt; Add / edit</strong>.</li>
<li>Fill all the fields. Dont forget  that image should be 125 x 125px. Also, pay attention to the <strong>Slot</strong> field. This defines the position of the Ad, with 1, being the top left position.</li>
<li>When you&#8217;re done, click <strong>Save add</strong> button.</li>

<li>Repeat the process for every other add that you wish to add.</li>
<li>Once you&#8217;re done, you can swith to <strong>Ads -&gt; Manage</strong>. All your ads are available at one screen there, you can edit and delete them as you wish.</li>
</ol>
<p>Regarding WP125, thats about it. If you have any further questions about this plugin, check out its <a href="http://wordpress.org/extend/plugins/wp125/">homepage.</a></p>
<h5>cForms plugin</h5>
<p>Kreativik uses cForms to handle the contact form. To set it up properly follow the following instructions:</p>

<ol>
<li>Download <a href="http://www.deliciousdays.com/cforms-plugin">cForms</a> plugin.</li>
<li>Copy the download content into your plugins directory <em>( http://yourdomain.com/wp-content/plugins )</em>.</li>
<li>Enter your WP Admin Interface</li>
<li>Select <strong>Plugins</strong> from the left menu</li>

<li>Find cForms, and <strong>Activate it</strong>.</li>
<li>Take a look at the bottom part of your left menu. There should be a new item called <strong>&#8220;cformsII&#8221;</strong>. Click it.</li>
<li>Welcome to the cforms admin screen. Click <strong>Add new form</strong>.</li>
<li>Type in the form name (e.g <strong>form1</strong> &#8211; remember this name, it is quite important)</li>

<li>I wont go through all the options of cforms (trust me, there is plenty of them) &#8211; if you need any special help that is beyond the scope of this file please start your search <a href="http://www.deliciousdays.com/cforms-plugin">here</a>.</li>
<li>We need to set up the email address which will receive all the messages from form. To this, click <strong>Admin Email Message Options</strong> in the accordion under menu.</li>
<li>Usually, all the mails go to the main wordpress admin email, but we can change it. To do it, please type your email address into the <strong>Admin email address(es):</strong> field.</li>
<li>Once youre done, click <strong>update settings</strong> in the menu on the right.</li>

</ol>
<p>We have created our form, it is ready to use. All we have to do now is put into our <strong>contact us</strong> page. To do this:</p>
<ol>
<li>If you haven&#8217;t already created the <strong>contact us</strong> page, do it now <strong>( Pages -&gt; Add new )</strong>.</li>

<li>Go to <strong>Pages -&gt; edit</strong> and click the contact us page.</li>
<li>Switch to HTML tab.</li>
<li>Insert the following string into page content: &lt;!&#8211;cforms name=&#8221;form1&#8243;&#8211;&gt; , with &#8220;form1&#8243; being the name of the form you created via cforms interface.</li>

<li>Save and update your contact us page</li>
</ol>
<p>Thats it. Now you have a fully functional contact form.</p>
<h4 id="bb">Working with billboard.</h4>
<p>We are very proud of the billboard in this theme. With this billboard, you can actually achieve some really stunning effects only with JS, no Flash is required.<br />
Please make sure that your images are <b>940 x 376px</b>.<br />
To change billboard slides:</p>
<ol>
<li>Login to the wordpress admin interface</li>

<li><b>Appearance -> kreativik</b></li>
<li>Click on <b>Billboard settings</b> tab.</li>
<li>Click on the grey space, upload your image (choose insert into post)</li>
<li>Click <b>update options</b> after each slide is added.</li>
</ol>
<p><b>Advanced billboard options</b><br />

You have the possbility to choose the delay between two slides, and the effect of transition.</p>
<p><b>Delay</b>: Insert the value in miliseconds here (1 second equals 1000 miliseconds, so if you want the delay to be 8 seconds, type 8000).<br />
<b>Effect</b>: You have these possibilities:</p>
<ul>
<li>Our slideshow -> sequence of three effects. First is the &#8220;random square transition&#8221;, Second is &#8220;left to right&#8221;, and third one is &#8220;top to bottom&#8221;</li>
<li>Random square only</li>

<li>Left to right only</li>
<li>Top to bottom only</li>
</ul>
<h4 id="featureds">Customizing featured services</h4>
<p>Featured services is the section that can be found on the homepage, right below the billboard.<br />
<img class="alignnone size-full wp-image-111" title="featured" src="<?=get_template_directory_uri()?>/images/screens/featured.jpg" alt="featured" width="935" height="213" /></p>
<p>In order to make editing them as easy as possible, we prepared an easy to interface specially for this purpose.<br />
To change featured services:</p>
<ol>
<li>Login into your WP Admin interface.</li>

<li>In the menu, click <strong>Appearance</strong>, then <strong>Kreativik</strong>.</li>
<li>Click on the 3rd tab &#8211; <strong> featured services </strong>.</li>
<li>You should see something like this:<br />
<img class="alignnone size-full wp-image-117" title="CM Capture 2" src="<?=get_template_directory_uri()?>/images/screens/CM-Capture-2.jpg" alt="CM Capture 2" width="940" height="443" /></li>
<li>Each Items has its own row. Heading is the first line of text (in bold). Text is the second line. And image is pretty self explanatory.</li>

<li>Edit items to fit your needs.</li>
<li>Once you&#8217;re done, click <strong>update options</strong> button.</li>
</ol>
<p>Congrats. Featured services have been changed.</p>
<h4 id="homep">Setting up the homepage, different variations of homepages</h4>
<p>We know that our customers may have different needs. Therefore, we tried to make this design usable for wide range of customers. In order to give you even more freedom, we prepared different variation of homepage content. Basically, you can choose one of the following:</p>
<ol>
<li><a href="#home1"> Homepage with introductory text and little icons with text in the right column.</a></li>

<li><a href="#home2"> Homepage with introductory text and recent posts in the right column.</a></li>
<li><a href="#home3"> Homepage with introductory text and recent comments in the right column.</a></li>
<li><a href="#home4">Homepage with introductory text and sidebar with widgets in the right column (with the column width ration as on innerpages).</a></li>
</ol>
<p>To change the homepage layout, go to <strong>Appearance -&gt; Kreativik -&gt; General options.</strong> You should see the following screen.<br />

<img class="alignnone size-full wp-image-129" title="CM-Capture-6" src="<?=get_template_directory_uri()?>/images/screens/CM-Capture-6.jpg" alt="CM-Capture-6" width="915" height="446" /></p>
<p>Take a look at the highlighted area. You can choose different option from the highlighted drop down.</p>
<p><b>Basically, the part that changes is actually only the left part. Everything that is on the right is generated from normal wp page called Home.</b></p>
<h5 id="home1">Homepage with introductory text and little icons with text in the right column.</h5>
<p><img class="alignnone size-full wp-image-124" title="CM Capture 3" src="<?=get_template_directory_uri()?>/images/screens/CM-Capture-31.jpg" alt="CM Capture 3" width="940" height="752" /><br />
As you can see in this image, the homepage content space is divided in 2 parts. Left half consists of heading and some text. You can edit this via kreativik theme options. To do so:</p>
<ol>
<li>Login WP admin interface</li>
<li>Click <strong>Appearance -&gt; kreativik</strong></li>

<li>Click on the first tab <strong>General options</strong></li>
<li>In the <strong>homepage configuration</strong>, select <strong>services</strong>.</li>
<li>Write the heading of your homepage into <strong>Homepage heading</strong> field.</li>
<li>Write the introductory text which will be displayed under homepage heading into <strong>Homepage text</strong> field.</li>

</ol>
<p><img class="alignnone size-full wp-image-122" title="CM Capture 4" src="<?=get_template_directory_uri()?>/images/screens/CM-Capture-4.jpg" alt="CM Capture 4" width="938" height="459" /></p>
<p>Now, you probably want to change little services icons in the right column. To do so:</p>
<ol>
<li>Go to <strong>Appearance -&gt; Kreativi</strong>.</li>
<li>Click on the 4th tab. <strong>(Homepage services)</strong></li>
<li>Following screen should appear:<br />
<img class="alignnone size-full wp-image-126" title="CM Capture 5" src="<?=get_template_directory_uri()?>/images/screens/CM-Capture-5.jpg" alt="CM Capture 5" width="722" height="389" /></li>

<li>Every item has its own row.</li>
<li><strong>Heading</strong> &#8211; The heading of service, highlighted in blue color.</li>
<li><strong>Link</strong> &#8211; Put url here if you want heading to link somewhere.</li>
<li><strong>Text</strong> &#8211; Text of your service description.</li>

<li><strong>Image</strong> &#8211; Image for your service (We do not recommend using icons larger than 48 x 48px here).</li>
<li>Confirm your changes by clicking <strong>update options</strong> once you are done.</li>
</ol>
<h5 id="home2">Homepage with introductory text and recent posts in the right column.</h5>
<p><img src="<?=get_template_directory_uri()?>/images/screens/kreativik-homepage-recent-p.jpg" alt="kreativik-homepage-recent-p" title="kreativik-homepage-recent-p" width="940" height="791" class="alignleft size-full wp-image-180" /></p><div class='clear'></div>
<h5 id="home3">Homepage with introductory text and recent comments in the right column.</h5>
<p>Same as the above, only the left parts is occupied by the recent comments.</p>

<h5 id="home4">Homepage with introductory text and sidebar with widgets in the right column (with the column width ration as on innerpages).</h5>
<img src="<?=get_template_directory_uri()?>/images/screens/kreativik-screen-homepagu-w.jpg" alt="kreativik-screen-homepagu-w" title="kreativik-screen-homepagu-w" width="940" height="836" class="alignleft size-full wp-image-182" /><div class='clear'></div>
<h4 id="portf">Setting up the portfolio</h4>
<p>For those of you, who want a little space to showcase your work, we prepared a portfolio section with integrated PrettyPhoto plugin. Basically,<br />
you upload images through admin interface, then, the thumbnails are cut to proper size, ribbon is added and the bigger image appears upon clicking. Pretty Photo also supports prev / next functionality.</p>
<p>Lets take a look at backend portfolio interface:<br />
<img class="alignnone size-full wp-image-156" title="CM-Capture-9" src="<?=get_template_directory_uri()?>/images/screens/CM-Capture-9.jpg" alt="CM-Capture-9" width="912" height="728" /></p>
<h5>About the categories</h5>
<p>So, at this point, probably all of you go around thinking: Great, but I dont do portfolio /multimedia/print. This is useless for me. <strong>Well, it is not.</strong> We include editable PSD file for ribbons. To change ribbons, do the following:</p>

<ol>
<li>Open ribbon.psd file that comes with the package</li>
<li>If you dont have the nevis font, please feel free to download it from <a href="http://www.tenbytwenty.com/products/typefaces/nevis">here</a>.</li>
<li>Change the text / colors to whatever you want.</li>
<li>Click <strong>File -&gt; Save for web and devices</strong>, for the format select PNG-24 and make sure that transparency is checked.</li>
<li>Name your files <strong>ribbon-1.png</strong>, <strong>ribbon-2.png</strong> and <strong>ribbon-3.png</strong></li>

<li>Upload these image to your images folder. The path to it should be something like: <em>http://yourdomain.com/wp-content/themes/kreativik/images</em></li>
<li>Thats it :)</li>
</ol>
<h5>Adding new portfolio entries</h5>
<p>Again, we tried to make this as simple for you as possible. So here we go:</p>
<ol>
<li>Login to your wordpress admin interface.</li>
<li><strong>Appearance -&gt; Kreativik</strong></li>

<li>Click on <strong>Portfolio</strong> tab</li>
<li>To add an image click on the grey area are that says <strong>Click here to add</strong> ;) </li>
<li>Upload your image, click <strong>insert into post</strong>.</li>
<li>Pick the category from the dropdown menu.</li>
<li>Save your new image by clicking the <strong>update options</strong> button.</li>

<li>Repeat this process until you fill your portfolio with your awesome previews.</li>
</ol>
<h5>How do I add this database of images into my frontend?</h5>
<p>Again. Easy.</p>
<ol>
<li>Add new page (you can call it whatever you want, it does not have to be portfolio).</li>
<li>Edit this page, turn HTML editing on and <strong><em>[ portfolio ]</em></strong> string into it (including the brackets, but make sure there are no gaps between brackets and string inside them. Example has look like this, otherwise wordpress would insert portfolio section into this doc file.</li>
<li>Save your page.</li>

<li>Thats it, your visitors are ready to be amazed!</li>
</ol>
<h4 id="chback">Changing the backrounds</h4>
<p>Kreativik comes with 5 background variations. They are:</p>
<ol>
<li>Clean white</li>
<li>Parquet</li>
<li>Carbon</li>
<li>Bokeh</li>
<li>Vintage</li>

</ol>
<p>You can change the background anytime from your theme options. To do so do following:</p>
<ol>
<li>Login to Wp Admin interface</li>
<li>From menu go to <strong>Appearance -&gt; kreativik</strong>.</li>
<li>Select first tab &#8211; general options.</li>
<li>Take a look at the background option.<br />

<img class="alignnone size-full wp-image-135" title="CM-Capture-7" src="<?=get_template_directory_uri()?>/images/screens/CM-Capture-7.jpg" alt="CM-Capture-7" width="831" height="210" /></li>
<li>Select the background that fits your needs.</li>
<li>Save your selection by clicking the <strong>update options</strong> button.</li>
</ol>
<h4 id="apages">Adding pages</h4>
<p>In order to add pages do following:</p>
<ol>
<li>Login into your WP admin interface.</li>
<li>From the left menu: <strong>Pagess -&gt; add new</strong></li>

<li>Fill the fields as you need to.</li>
<li>Save the post by clicking the <strong>Publish</strong> button</li>
</ol>
<p>If you want to add page as a subpage, be sure to add her a parrent page (right menu).<br />
You can also edit the order in which pages appear in the navigation. Take a look at the right menu in add page screen. You should see a box called order. Now, all you have to do is enter number. Wordpress will then arrange the order of pages in the way that page with the lowest order value will be the first etc etc. So, for instance, if you have 3 pages called Home, About us and Service, and you want to show them in that order, Home should have order 0, About us 1 and services 3.</p>
<h4 id="fullw">How to add a full width page?</h4>
<p>So lets say you want to display only your main content and no sidebar (which is basically layout of this doc page). How do you do that?</p>
<ol>

<li>Add a new page as always.</li>
<li>In add page screen pay special attention to &#8220;custom fields&#8221; box.</li>
<li>Add new one with the following strings: <strong>name:</strong> layout, <strong>value:</strong> full.</li>
<li>Update / publish your page.</li>

<li>Done.</li>
</ol>
<h4 id="aposts">Adding posts</h4>
<p>In order to add posts do following:</p>
<ol>
<li>Login into your WP admin interface.</li>
<li>From the left menu: <strong>Posts -&gt; add new</strong></li>
<li>Fill the fields as you wish.</li>

<li>Save the post by clicking the <strong>Publish</strong> button</li>
</ol>
<h4 id="imgb">How do I add an Image to the blog post excerpt?</h4>
<p>Easy to do. While Adding blog post, scroll all the way down to the &#8220;Kreativik custom image box&#8221;. Upload your image here. It should be 610px wide for best perfomance.</p>
			