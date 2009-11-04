Unity Asset Server Browser
---------------------------------------------------

Hey guys!  Welcome to our PHP-based Asset Server browser!  We've found this to be really
useful; we hope you will too!  A couple notes:

INSTALLATION

You'll need the PostgreSQL stuff compiled into PHP.  This should be there by default, but
it will depend on your host.  You'll need to edit some stuff in _php/inc.php for your
setup:

	// the login/password (should be asset server admin info)
	define("PG_USER", "admin");
	define("PG_PASSWORD", "your-password-here");

	// server-specific stuff
	define("ROOT", "/www/staging/aserver/"); // root path to where these PHP files live
	define("HTTPROOT", "http://www.somewhere.com/browser/"); // url path

You MUST make _tpl_c writable by the server!  This is where Smarty dumps a bunch of files
(Smarty is a templating engine we use).

I *think* that's it.  Please comment on the Blurst technology blog if you have issues
with installation.

SUPPORT

We're pretty busy these days.  Hell, it took us forever to release this.  We won't be
able to support it, sorry.  Please leave a comment on the blog and hopefully another user
will be able to help you out.

CODE QUALITY

The entire browser was coded in one day (we spend our Fridays doing experimental/learning
stuff, and I set out to write a browser one Friday).  As a result the code is pretty
sloppy in places!  It's also a fork of an older PHP framework we created, so you may see
some references to other stuff in the code.

That said, this is totally usable, and we've been using it for over a year now.

IMPROVEMENTS

If you do improve something with the code please share your changes.  Email me directly
and I'll roll it into the mainline release.

CONTACT

This was created by me.  I can be reached at:

Matthew Wegner
Flashbang Studios
mwegner@flashbangstudios.com

If you like this, feel free to give us some beer money:  paypal@blurst.com

