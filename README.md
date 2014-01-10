listdirectory
=============

PHP Directory Listings

Want to display a folder to the world? Want to be able to exclude certain files or add custom columns? Well then, I think you have found the right place.

1. Download to your webserver
2. Edit index.php for page specific excludes, title, date format, columns.
NOTE: The index.php will find the includes/ folder as long as it is in the same directory or in a parent directory.
3. Verify that your webserver can write to the directory if you want thumbnails.
4. Launch the page and you should see a directory listing.

Need something custom?

I am trying to make it more customizable. I have just recently added an easy way to create custom columns. Just have a look at includes/columns/Template.php on how to create your own columns.

Let me know if you have a suggestion, bug, or feature request. I made this for home server and have also used it in many other implementations.
