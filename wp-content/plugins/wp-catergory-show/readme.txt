=== Category Show ===
Contributors: chackal_sjc
Donate link: http://www.dreamhost.com/donate.cgi?id=12296
Tags: category, tag, show, list, post
Requires at least: 2.7
Tested up to: 3.1
Stable tag: 0.4.2

Shows all posts from a category/tag into a page/post with order support.

== Description ==

It's an easy way to show and order all posts from category/tag into a page/post. Really handy for showing your tutorials, articles, etcetera.
It shows as a list(&lt;ul&gt;&lt;li&gt;) so it will apply your blog style-sheet as you wish.

<strong>Note:</strong> If the selected term(category or tag) has a description, it will be shown in a &lt;blockquote&gt; tag.

To see it in action click [here](http://felipetonello.com/blog/tutoriais-e-artigos/ "Felipe Tonello blog").

Usage:

1. Go to Category Show's options page and generate the tag.

2. Insert your new tag into your post.

Tags to know:

If you want to apply some CSS, those are the tags you should know: <strong>&lt;h3&gt;</strong>, <strong>&lt;ul&gt;</strong>, <strong>&lt;li&gt;</strong>, <strong>&lt;a&gt;</strong> and <strong>&lt;blockquote&gt;</strong>.

Output example:

	<h3>Category</h3>
	<blockquote>Category description, if exists</blockquote>
	<ul>
	<li><a title="link title" rel="bookmark" href="link">title</a></li>
	</ul>


That's it!

== Installation ==

1. Upload 'wp-category-show' directory to the '/wp-content/plugins/' directory on your server
1. Activate the plugin through the 'Plugins' menu in Wordpress
1. Go to Category Show's options page and generate your tag
1. Insert your new tag (something like '%%wpcs-category-slug%%') into your post or page!

== Frequently Asked Questions ==

= Can I use it inside others HTML tag, such a table? =

Yes. In version 0.3.1 was fixed a limitation that made impossible to do such a thing. So always use the latest version.

= Can I use it more than one time per post? =

Yes. Anytime you want. But remember that Category Show doesn't have page support <strong>yet</strong>, it will be in its next versions.

= When is going to have page support? =

Page support is coming for 0.5.

== Screenshots ==

1. Plugin in action executing 2 times in the same post.
2. Listing 2 different categories in the same post. Screenshot-1 shows the post.
3. Category Show's options page.

== TODO ==

* Each topic content preview.
* Page support.
* A RSS edition of Category Show.
* Add widget support.
* Select user's own category in options page. (DONE)
* Make it possible to get a date in front of each link.
* Create a definitely Category Show tag for the posts. 

If you want to suggest some feature, please contact me [here](http://felipetonello.com/blog/wordpress-plugins/category-show/ "Felipe Tonello blog").

== Changes ==

* 0.4.2: Date ordering bug fix.
* 0.4.1: Added support to show category description if exists. Now the tag generation uses term_id as the expression, not the tag slug anymore.
* 0.4: Now the user can generate his tag from the Category Show's options page. No more writing your tag!
* 0.3.2: Deleted debug messages that was been printed on 0.3.1.
* 0.3.1: Fixed bug that the content was been all replaced by the list, not just the tag. Added Brazilian Portuguese translation.
* 0.3: Added support to change the ordering by title or date. Added options page to generate neat tags for the post. Even more optimized!
* 0.2.3: Fixing &lt;ul&gt; end tag bug. Updating readme.txt file nicely.
* 0.2.2: Adding screenshot showing how it works and adding pt_BR .mo translation file.
