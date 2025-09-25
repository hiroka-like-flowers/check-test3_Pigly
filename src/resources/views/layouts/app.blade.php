<!-- 共通部分 -->
<!DOCTYPE html>
<html lang="ja">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>


<body>
    <div class="app">
        <header class="header">
            <h1 class="header__heading">PiGLy</h1>
            <div class="header__button">
                <a  class="header__link-goal" href="">目標体重設定</a>
                <a class="header__link-logout" href="">ログアウト</a>
            </div><!-- link先はあとで入れる -->
        </header>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>


</html>