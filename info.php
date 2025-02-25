<?php
    // Kullanıcının tarayıcı bilgilerini al
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // İşletim sistemini belirlemek için User Agent'ı analiz et
    function getOS($user_agent) {
        $os_array = array(
            '/windows nt 10/i'      => 'Windows 10',
            '/windows nt 6.3/i'     => 'Windows 8.1',
            '/windows nt 6.2/i'     => 'Windows 8',
            '/windows nt 6.1/i'     => 'Windows 7',
            '/windows nt 6.0/i'     => 'Windows Vista',
            '/windows nt 5.2/i'     => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     => 'Windows XP',
            '/windows xp/i'         => 'Windows XP',
            '/windows nt 5.0/i'     => 'Windows 2000',
            '/windows me/i'         => 'Windows ME',
            '/win98/i'              => 'Windows 98',
            '/win95/i'              => 'Windows 95',
            '/win16/i'              => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i'        => 'Mac OS 9',
            '/linux/i'              => 'Linux',
            '/ubuntu/i'             => 'Ubuntu',
            '/iphone/i'             => 'iPhone',
            '/ipod/i'               => 'iPod',
            '/ipad/i'               => 'iPad',
            '/android/i'            => 'Android',
            '/blackberry/i'         => 'BlackBerry',
            '/webos/i'              => 'Mobile'
        );

        $os_platform = "Bilinmeyen İşletim Sistemi";

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }
        return $os_platform;
    }

    // Tarayıcıyı belirlemek için User Agent'ı analiz et
    function getBrowser($user_agent) {
        $browser_array = array(
            '/msie/i'       => 'Internet Explorer',
            '/firefox/i'    => 'Firefox',
            '/safari/i'     => 'Safari',
            '/chrome/i'     => 'Chrome',
            '/edge/i'       => 'Edge',
            '/opera/i'      => 'Opera',
            '/netscape/i'   => 'Netscape',
            '/maxthon/i'    => 'Maxthon',
            '/konqueror/i'  => 'Konqueror',
            '/mobile/i'     => 'Handheld Browser'
        );

        $browser = "Bilinmeyen Tarayıcı";

        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }
        return $browser;
    }

    $user_os = getOS($user_agent);
    $user_browser = getBrowser($user_agent);

    // Mobil cihazdan mı bağlanılıyor kontrolü
    $is_mobile = preg_match('/iphone|ipod|ipad|android|blackberry|webos/i', $user_agent);

    if ($is_mobile) {
        // Mobil cihazdan bağlanılıyorsa başka bir sayfaya yönlendir
        header("Location: mobil_sayfa.php");
        exit;
    } else {
        // Bilgisayardan bağlanılıyorsa kullanıcı bilgilerini ekrana yazdır
        echo "IP Adresi: " . $_SERVER['REMOTE_ADDR'] . "<br>";
        echo "Tarayıcı: $user_browser <br>";
        echo "İşletim Sistemi: $user_os <br>";
    }
?>