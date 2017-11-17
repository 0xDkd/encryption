<?php

if (empty($_POST)){
    $_POST = '';
}
//加密算法开始
$key = 'ht.acgbuster.com';
function encrypt($string,$operation,$key=''){
    $key=md5($key);
    $key_length=strlen($key);
    $string=$operation=='D'?base64_decode($string):substr(md5($string.$key),0,8).$string;
    $string_length=strlen($string);
    $rndkey=$box=array();
    $result='';
    for($i=0;$i<=255;$i++){
        $rndkey[$i]=ord($key[$i%$key_length]);
        $box[$i]=$i;
    }
    for($j=$i=0;$i<256;$i++){
        $j=($j+$box[$i]+$rndkey[$i])%256;
        $tmp=$box[$i];
        $box[$i]=$box[$j];
        $box[$j]=$tmp;
    }
    for($a=$j=$i=0;$i<$string_length;$i++){
        $a=($a+1)%256;
        $j=($j+$box[$a])%256;
        $tmp=$box[$a];
        $box[$a]=$box[$j];
        $box[$j]=$tmp;
        $result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256]));
    }
    if($operation=='D'){
        if(substr($result,0,8)==substr(md5(substr($result,8).$key),0,8)){
            return substr($result,8);
        }else{
            return'';
        }
    }else{
        return str_replace('=','',base64_encode($result));
    }
}
?>
<!DOCTYPE html>
<html>
<!--面码的buster绅士向保留所有权利，未经同意，不得仿制-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="tools,pan.baidu.com,百度网盘,加密,解密">
    <meta name="author" content="acgbuster">
    <!--new-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="0w0.css" >
    <title>面码buster工具系统</title>
</head>
<body>
<!--NavBar Start -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-color: #4caf50">
    <a class="navbar-brand" href="https://ht.acgbuster.com" target="_blank">面码的buster工具箱</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <button class="nav-link btn-raised btn btn-info" href="https://ht.acgbuster.com" target="_blank">主页<span class="sr-only">(current)</span></>
            </li>&nbsp;&nbsp;&nbsp;
            <li class="nav-item active">
                <button class="nav-link btn btn-danger btn-raised"  data-toggle="modal" data-target="#donate" rel="https://0w0.tn/#">捐助我们</button>
            </li>
            <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>-->
        </ul>
       <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
    </div>
</nav>
<!-- Modal get_ -->
<div class="modal fade" id="get_hack_link" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="get_hack_link">复制成功~</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                结果已经复制到你的剪贴板上啦，如果失败，请点击上面的按钮自己复制一下~（IE9一下浏览器可能无法正常复制）
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-raised" data-dismiss="modal">知道了喵~</button>
            </div>
        </div>
    </div>
</div>
<!--Modal donate qrcode-->
<div class="modal fade" id="donate" tabindex="-1" role="dialog" aria-labelledby="donate" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="donate">捐助</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="https://i.loli.net/2017/10/06/59d6f9b16be1c.png" alt="微信">
                    <div class="card-body">
                        <p class="card-text" style="color:#92cc0e; font-size: 16px">十分感谢您能帮助我们维持服务器~</p>
                    </div>
                </div>
                <div class="card">
                    <a href="HTTPS://QR.ALIPAY.COM/FKX08754C0ELIS8KS8V140" target="_blank"> <img class="card-img-top" src="https://i.loli.net/2017/10/06/59d6f600abe19.png" alt="支付宝"></a>
                    <div class="card-body">

                        <p class="card-text" style="color:#26a1ee; font-size: 16px">TIP:手机端点击图片可以进行捐助（仅限支付宝QuQ）</p>
                    </div>
                </div>
            </div>
            <br />
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-raised" data-dismiss="modal">感谢捐1助~</button>
            </div>
        </div>
    </div>
</div>
<!--donate qrcode end-->
<div class="container-fluid">
    <!--主题样式开始-->
    <div class="jumbotron">
        <!--card 1-->
        <div class="card mb-3">
            <img class="card-img-top" src="https://ooo.0o0.ooo/2017/02/19/58a9706412c15.png" alt="cover" height="250">
            <div class="card-body">
                <h4 class="card-title">请输入神秘代码</h4>
                <p style="color: #27c24c;font-size: 18px;">服务器费用最近告急……请大家伸出援手帮助一下我们（认真脸）……十分感谢！<p><button data-toggle="modal" data-target="#donate" class="btn  btn-info btn-raised active">捐助我们</button>
                <form class="form-group" method="post" action="">
                    <div class="form-group">
                        <label for="content_box" class="bmd-label-floating">请填写需要加密或者解密的内容 </label>
                        <input autocomplete = "off" type="text" id="content_box" class="form-control" name="content" value="<?php echo isset($_POST['is_true']) ? $_POST['content'] :'' ?>" >
                        <span class="bmd-help">请认真填写哦~</span>
                        <span class="bmd-help">如果你是来自B站的绅士，恭喜你发现了神秘的地方 (//▽//)</span>
                    </div>
                    <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="is_true"  value="D">
                            进行<span class="badge badge-pill badge-info">解密</span>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="is_true"  value="E">
                            进行<span class="badge badge-pill badge-danger">加密</span>
                        </label>
                    </div>
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn-primary btn-raised btn" value="提交">
                    </div>
                </form>
                <?php
                //统计字节大小
                if( isset($_POST['is_true'])){
                    //过滤无聊的所谓的xss
                    if (strlen($_POST['content']) > 500){
                        echo "<div class=\"alert alert-danger\" role=\"alert\"><i class=\"mdui-icon material-icons\">warning</i>服务器君表示他吃不消了TAT，咱能正常一点吗</div>";
                        $_POST['content'] = '';
                    }else{
                    if (strrchr($_POST['content'],'<') || strrchr($_POST['content'],'>') ){
                        $_POST['content'] = "请不要做这种事情，这对我们都没有好处，望君理解";
                        echo "<div class=\"alert alert-danger\" role=\"alert\"><i class=\"mdui-icon material-icons\">warning</i>请不要做这种事情，这对我们都没有好处，望君理解</div>";
                    }else{
                        if ($_POST['is_true'] == 'E'){
                        $token = encrypt($_POST['content'], 'E', $key);
                        echo "<div class=\"alert alert-success\" role=\"alert\"><i class=\"mdui-icon material-icons\">lock</i>加密结果如下:<br />$token</div>";
                        $button = <<<HTML
                                        <button type="button" class="copy-text btn btn-raised btn-success " data-toggle="modal" data-target="#get_hack_link" data-clipboard-text="$token" onclick="fn_get(this)"><i class="mdui-icon material-icons">notifications</i>复制结果</button>
HTML;
                        echo $button;
                    }
                    //解密的情况
                    if ($_POST['is_true'] == 'D'){
                        $str =  encrypt($_POST['content'], 'D', $key);
                        //找到百度网盘专属链接
                        if ($str == ''){
                            echo "<div class=\"alert alert-danger\" role=\"alert\"><i class=\"mdui-icon material-icons\">warning</i>sorry,这个貌似没有被加密过~</div>";
                        }else{
                        if($str_last = strrchr($str,"baidu.com/s")) {
                            //如果有密码的话
                            if ($str_pass = strrchr($str_last,':')){
                                //真正的提取码
                                $str_rel_pass = substr($str_pass,1);
                                //处理纯链接问题 格式为 链接: https://pan.baidu.com/s/1i5L4FQH 密码: frzx
                                //切割后为/1i5L4FQH 密码: frzx
                                //第一次反转
                                $str_link = strrev($str_last);
                                //进行切割，从最后空格开始切割
                                $str_link = strrchr($str_link,' ');
                                //再次反转,数值为baidu.com/s/1i5L4FQH
                                $str_link = strrev($str_link);
                                //提取码复制按钮
                                $button_pass = <<<HTML
                                        <button type="button" class="copy-text btn btn-raised btn-success " data-toggle="modal" data-target="#get_hack_link" data-clipboard-text="$str_rel_pass" onclick="fn_get(this)">点击复制提取码</button>
HTML;
                                $button_link = <<<HTML
                                        <a href="https://pan.$str_link"  target="_blank" class=" btn btn-raised btn-info " rel="nofollow"><img src="https://pan.baidu.com/box-static/disk-system/images/favicon.ico" height="20px" width="20px"> 直接到百度网盘</a>
HTML;
                                echo "<div class=\"alert alert-primary\" role=\"alert\"><i class=\"mdui-icon material-icons\">beenhere</i>啊啦啦？你是绅士吗？你解密出来的东西可是百度网盘呀~<br />请先复制密码然后直接点击下面按钮访问就好啦~</div>";
                                echo $button_pass . ' ' . $button_link ;
                            }else{
                                //如果没有密码的话
                                $button_link = <<<HTML
                                        <a href="https://pan.$str_last"  target="_blank" class=" btn btn-raised btn-info  " rel="nofollow"><img src="https://pan.baidu.com/box-static/disk-system/images/favicon.ico" height="20px" width="20px"> 直接到百度网盘</a>
HTML;
                                echo "<div class=\"alert alert-primary\" role=\"alert\"><i class=\"mdui-icon material-icons\">beenhere</i> 啊啦啦？你是绅士吗？你解密出来的东西可是百度网盘呀~<br />请先复制密码然后直接点击下面按钮访问就好啦~</div>";
                                echo $button_link;
                            }
                        }
                        //解密结果暑促
                        echo "<div class=\"alert alert-success\" role=\"alert\"><i class=\"mdui-icon material-icons\">fingerprint</i>解密结果如下:<br />$str</div>";
                        //复制按钮
                        $button = <<<HTML
                                        <button type="button" class="copy-text btn btn-raised btn-success " data-toggle="modal" data-target="#get_hack_link" data-clipboard-text="$str" onclick="fn_get(this)"><i class="mdui-icon material-icons">done_all</i>复制结果</button>
HTML;
                        //输出复制按钮
                        echo $button;
                        }
                    }
                    }
                }
                }
                ?>
                <p class="card-text"><small class="text-muted">来自面码的buster绅士向</small></p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.js"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/js/bootstrap-material-design.js" integrity="sha384-hC7RwS0Uz+TOt6rNG8GX0xYCJ2EydZt1HeElNwQqW+3udRol4XwyBfISrNDgQcGA" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<script>
    $(function () { $("[data-toggle='tooltip']").tooltip(); });
    $(function () {
        $('[data-toggle="popover"]').popover()})
    $(function(){
        new Clipboard('.copy-text');
    });

    $(".copy-text").click(function () {
        $("#result").modal();
        $("#msg").html("已复制到您的剪贴板，请您继续接下来的操作。");
    });
    function fn_get(con){
        con.innerText = '复制成功';
        //con.class = 'btn-danger btn-disable';
    }
</script>
<script src="//cdn.bootcss.com/clipboard.js/1.6.1/clipboard.min.js"></script>

</body>

</html>
