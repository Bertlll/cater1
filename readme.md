feeds. edu project
--------------------------------------------
Team Leader             : John Emmanuel Sergio
UX Designer/Engineer    : Albert Zedrick Dela Cruz
Back-end/ Database      : Pauleen Agawin
---------------------------------------------

====================
Variables and Links
====================

=====> INDEX.PHP <=====

$page - for page control/ title header
$_GET['page'] - for switching links that is connect from each href with the variable of 'page'
	ex: index.php?page=client-signup

client-signup.php - for client to sign up
cater-signup.php - for cater to sign up
home.php - includes index header

!when signing in, home.php uses do_login.php in the CONTROLLERS FOLDER to check whether the user is client or cater. If one is not yet verified, an alert will pop out saying "You are not verified yet".

(FOLDER PAGES)
=====> CLIENT-SIGNUP.PHP <=====
input names:
 - fname
 - lname
 - mobile_num
 - email
 - password
 - password 2
 - address1 (to be remove)
 - address2 (to be remove)
 - zip_code (to be remove)
 - city (to be remove)

require_once 'control/authController_client.php';
 - to send data to database and send token using SMTP

=====> CATER-SIGNUP.PHP <=====
input names:
 - comp_name
 - landline_num
 - mobile_num
 - email
 - password
 - password2
 - address1 (to be remove)
 - address2 (to be remove)
 - zip_code (to be remove)
 - city (to be remove)

require_once 'control/authController_cater.php';
 - to send data to database and send token using SMTP

=====> CLIENT.PHP <=====
include '../config/database.php'; <--- getting feeds db
include '../controllers/authController_client.php'; <--- di ko na tanda hehe
include '../controllers/action.php'; <--- to start session of the user logged in

$token = $_GET['token']; <--- gets the given token of user
verifyUser($token); - will activate the account if the user clicked the given link to their email

$page - for page control/ title header
$_GET['page'] - for switching links that is connect from each href with the variable of 'page'
	ex: pages/client.php?page=client-profile

client-header.php - navbar
client-home.php - homepage
client-profile <--- to be edit
client-transactopn - n/a
client-calendar - n/a

!   CLIENT-HOME.PHP   !
shows the list of active caterers. Can view their profile provided by a link and client can filter out depending on their pricing.


=====> CATER.PHP <=====
include '../config/database.php'; <--- getting feeds db
include '../controllers/authController_cater.php'; <--- di ko na tanda hehe
include '../controllers/action.php'; <--- to start session of the user logged in

$token = $_GET['token']; <--- gets the given token of user
verifyUser($token); - will activate the account if the user clicked the given link to their email

$page - for page control/ title header
$_GET['page'] - for switching links that is connect from each href with the variable of 'page'
	ex: pages/cater.php?page=cater-profile

cater-header.php - navbar
cater-home.php - homepage
cater-profile - profile
cater-transactopn - n/a
cater-calendar - n/a

=====> CATER-PROFILE.PHP <=====

SIDENAVS:
  $id_number - cater's id_number
  $sql - calling query of table 'cater_profile'
  $row1 - fetch array of $sql
    if the user is new, profile pic is empty. Calling an image from the folder '../system_img/profile_edit.png'. Will soon change if the user edit their profile
     - About
     - Portfolios
     - Bundles
     - Contact

     !     ABOUT     !
     $getBanner - calling query of table 'cater_profile'
     $rowBanner - fetch array of $getBanner
     $banner - calling banner image from the url location (banner is the background image of the about)

     $getAbouts - calling query of table 'cater_profile'
     $rowAbouts - fetch array of $getAbouts
     $about - calling about column (about is the description of the company)
     $tagline - caling tagline column (tagline is the short description)


     !     PORTFOLIO     !
     $sql2 - calling query of table 'cater_folder' where id_number is user's id number ($id_number)
        *cater folder - parent table of the image_folder. Where images can bundled as an album.
     $row - fetch array of $sql2
     $title - title of the album
     $description - description of the album
     $folder_num - primary key of the album

     $result_p - calling query of table 'image_folder' where FOLDER_NUM is linked to its parent (cater_folder/foreign key)
     $row_p - fetch array of $result_p (first image is the thumbnail of the album)

        albums can be viewed by modal. <a href='#view".$folder_num."' data-toggle='modal' style='text-decoration:none'>

==========