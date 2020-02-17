<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['calendar/index']='calendar/index';

$route['home/index']='home/index';
$route['home/about']='home/searchentry';


$route['accounts/register']='accounts/register';
$route['accounts/index']='accounts/index';
$route['accounts/confirmation']='accounts/confirmation';

$route['charts/index']='charts/index';

$route['orders/successview']='orders/successview';
$route['orders/reviewitems']='orders/reviewitems';
$route['orders/index']='orders/index';

$route['nominate/addentry']='nominate/addentry';
$route['nominate/finishpage']='nominate/finishpage';
$route['nominate/nomination']='nominate/nomination';
$route['nominate/reviewitems/(:any)'] = 'nominate/reviewitems/$1';
$route['nominate/index']='nominate/index';


$route['login/index']='login/index';

$route['admins/restrictedpage']='admins/restrictedpage';
$route['admins/manageservices']='admins/manageservices';
$route['admins/services']='admins/services';
$route['admins/managepromotions']='admins/managepromotions';
$route['admins/managestaff']='admins/managestaff';
$route['admins/homesetting']='admins/homesetting';
$route['admins/reports']='admins/reports';

$route['admins']='admins/index';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
