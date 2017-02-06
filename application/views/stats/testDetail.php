<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>테스트</title>
    <style>
        /** * Eric Meyer's Reset CSS v2.0 (http://meyerweb.com/eric/tools/css/reset/) * http://cssreset.com */
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure,
        footer, header, hgroup, menu, nav, section {
            display: block;
        }
        body {
            line-height: 1;background-color: #f0f0f0;
        }
        ol, ul {
            list-style: none;
        }
        blockquote, q {
            quotes: none;
        }
        blockquote:before, blockquote:after,q:before, q:after {
            content: '';
            content: none;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
        *, *:before, *:after {
            box-sizing: border-box;
        }


        #main_header {background: #4D5152;    position: fixed; padding: 1.5em; left: 0;  width: 25%;  height: 100%;  overflow-y: auto;}
        .header_title {text-align: center;}
        .header_title p {padding: 0.5em;}
        .header_title a {
            text-align: center;font-size: 27px;color: #ffffff;
        }

        .header_content_list a {display: block;  text-decoration: none;  padding: 1em;
            border-bottom: 1px solid rgba(255,255,255,.1);  border-left: 2px solid transparent;  font-weight: 300;color: rgba(255,255,255,.65);}
        .header_content_list a:hover {color: #dd4c39;  border-left: 2px solid #dd4c39; background: rgba(0,0,0,.05);}

        .toggle_menu_button {display: none;}

        #main_area {padding-left: 0.75em;  padding-right: 0.75em;  padding-top: 1.5em;  padding-bottom: 1.5em;  width: 75%;  float: right;}

        .article_list{width: 20%;float: left;padding: 0 0.75em;margin-bottom: 1.5em;}
        .article_list img {width: 100%;border-top-left-radius: 4px;  border-top-right-radius: 4px;}
        .article_list .article_title {
            padding-top: 1.5em;padding-bottom: 1.0em;border-bottom: 1px solid rgba(0,0,0,.05);font-size: 1em;font-weight: bold;padding-left: 0.5em;
        }
        .article_list .article_footer{ padding: 1em 0;}
        .article_list .article_footer span{padding: 0 0.5em;font-size: 0.875em;color:#888888; }

        .article_list .article_list_item {background-color: #fff; border-radius: 4px;}
        .article_list .article_list_item .article_list_item_content {padding: 0.5em;}
        .area_header_title {margin-bottom: 1.5em;background-color: #dd4c39;color:#fff;text-align: center;border-radius: 4px;}
        .area_header_title h1{font-size: 2.1em;font-weight: 300;padding: 0.6em;}

        /*여기부터 디테일 영역 */
        .main_board_content{width: 60%;float: left;padding: 0 0.75em;}
        .main_board_sidebar{width: 40%;height: 900px;background-color: #518fbb;float: left;padding: 0 0.75em;}
        .board_content_area{width: 100%;background-color: #fff;margin-bottom: 1.5em;padding: 1.5em;border-radius: 9px;}
        .board_content_area_edit{float:right;}
        .board_content_area_header{border-bottom: 1px solid #e8e8e8;padding: 1.5em 0;}
        .board_content_area_header_title{font-size: 1.5em;font-weight: 600;}
        .board_content_area_header_sub{padding-top: 0.5em;  font-size: 0.85em;  color: #4D5152;}
        .board_content_area_body{padding: 1.5em 0;}
        .board_comment_area{width: 100%;background-color: #fff;padding : 0 0.75em 1.5em 0.75em;border-radius: 9px; border-top: 8px #DD4C39 solid;}
        .board_comment_area_header{padding: 1.5em 0 1em 0;border-bottom: 3px solid #e8e8e8;font-weight: 600;}
        .board_comment_insert_area {padding: 1em 0;}
        .board_comment_insert_area .comment_input_box{    width: 80%;  border: 1px solid #ccc;  border-radius: 4px;  min-height: 35px;padding: 6px 12px;}
        .board_comment_insert_area .comment_input_box_send{   border: 1px solid #ccc;padding: 0.7em;border-radius: 8px; font-size: 0.8em; display: inline;}
        .board_comment_insert_area .comment_input_box_send:hover{cursor: pointer;}
        .board_comment_lists{overflow: hidden;}
        .board_comment_lists .board_comment_lists_body{width: 90%;float: left;padding-top: 1.5em;}
        .board_comment_lists .board_comment_lists_sub{width: 10%;float: left;padding-top: 2.5em;}
        .board_comment_lists .board_comment_lists_body .board_comment_lists_body_img{float: left;}
        .board_comment_lists .board_comment_lists_body .board_comment_lists_body_img > img{width: 45px;height: 45px;border-radius: 50%;float: right;}
        .board_comment_lists .board_comment_lists_body .board_comment_lists_body_contents{ float: left;width: 85%;padding-left: 0.5em;}
        .board_comment_lists .board_comment_lists_body .board_comment_lists_body_contents .comment_writer{ color: #DD4C39;font-weight: 600;font-size: 0.9em;padding-right: 0.5em;}
        .board_comment_lists .board_comment_lists_body .board_comment_lists_body_contents .comment_date{ color: #888;font-weight: 300;font-size: 0.8em;}
        .board_comment_lists .board_comment_lists_body .board_comment_lists_body_contents .comment_content{padding-top: 0.3em;}


        @media (max-width: 960px){
            #main_header {  position: relative;  width: 100%;}
            #main_area{width: 100%;margin-left: 0em;margin-right: 0em;}
            .article_list {width: 100%;padding: 0;}
            .toggle_menu_button{width: 100%;padding:1em 1.5em;background-color: #dd4c39;border-radius: 4px; color: #fff;display: block;}
              /*여기부터 디테일 영역 */
            .main_board_content{width: 100%;margin-bottom: 1.5em;padding: 0;}
            .main_board_sidebar{width: 100%;}
            .board_comment_insert_area .comment_input_box{width: 75%;}
            .board_comment_lists .board_comment_lists_body .board_comment_lists_body_contents{width: 80%;}

        }

    </style>
</head>
<body>
<div id="main" style="width: 100%;background-color: #f0f0f0;">
    <header id="main_header">
        <div >
            <div class="header_title">
                <p><a href="#">Hwang Blog</a></p>
                <p>study for WebProgramming</p>
            </div>
            <div class="header_toggle_menu">
                <div class="toggle_menu_button">메뉴 더보기</div>
            </div>
            <div class="header_content">
                <nav class="header_content_list">
                    <ul>
                        <li>
                            <a href="#">게시판</a>
                        </li>
                        <li>
                            <a href="#">두번째 게시판</a>
                        </li>
                        <li>
                            <a href="#">세번째 게시판</a>
                        </li>
                        <li>
                            <a href="#">네번째 게시판</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div id="main_area">
        <div>

        </div>
        <div class="main_board_content">
            <div class="board_content_area">
                <header class="board_content_area_header">
                    <div class="board_content_area_header_title"><h3>리액트 제이쿼리 설정해주기</h3></div>
                    <div class="board_content_area_header_sub"><span>2016년 12월 31일 글쓴이 :  황성인</span></div>
                    <div class="board_content_area_edit"><button>게시글 수정</button></div>
                </header>
                <div class="board_content_area_body">
                    <div class="panel-body board_body board_content" ><pre style="margin-bottom: 0px; font-size: 14px;"><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">var </span>config = {<br>  <span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">devtool</span>: <span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">'eval-source-map'</span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">,<br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span><span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">entry</span>:  __dirname + <span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">"/app/src/Components/App.js"</span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">,<br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span><span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">output</span>: {<br>    <span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">path</span>: __dirname + <span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">"/public"</span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">,<br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span><span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">filename</span>: <span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">"bundle.js"<br></span><span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">&nbsp;</span>}<span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);"><br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span><span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">externals</span>: {<br>    <span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">"jQuery"</span>: <span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">"jQuery"</span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">,<br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span><span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">"$"</span>: <span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">"jquery"<br></span><span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">&nbsp;</span>}<span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">,<br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span><span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">devServer</span>: {<br>    <span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">contentBase</span>: <span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">"./public"</span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">,<br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span><span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">colors</span>: <span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">true</span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">,<br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span><span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">port</span>: <span data-mce-style="color: #6897bb;" style="color: rgb(104, 151, 187);">8080</span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">,<br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span><span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">historyApiFallback</span>: <span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">true</span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">,<br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span><span data-mce-style="color: #9876aa;" style="color: rgb(152, 118, 170);">inline</span>: <span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">true<br></span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">&nbsp;</span>}<span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">,<br></span>}</pre><p style="margin-top: 10px; margin-bottom: 0px; word-wrap: break-word; color: rgb(51, 51, 51); font-family: Arial, sans-serif;">위의 코드는 웹팩 설정파일의 일부를 가져온 것입니다. 보통 웹팩설정에서 npm으로 제이쿼리를 설치 후(npm install jQuery) &nbsp;externals에 제이쿼리에 대한 세팅을 해준 후</p><p style="margin-top: 10px; margin-bottom: 0px; word-wrap: break-word; color: rgb(51, 51, 51); font-family: Arial, sans-serif;">제이쿼리를 원하는 jsx 파일에서</p><pre style="margin-top: 10px; margin-bottom: 0px; font-size: 14px;"><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">import </span>$ <span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">from </span><span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">'jquery'</span><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">;</span></pre><p style="margin-top: 10px; margin-bottom: 0px; word-wrap: break-word; color: rgb(51, 51, 51); font-family: Arial, sans-serif;">라는 형태로 작성하면 리액트 내에서도 일반적인 제이쿼리를 병행해서 사용할수 있습니다. 그러나 정확한 이유는 아직 찾지 못하였지만 저런식으로 선언해서 사용하면 일부 제이쿼리</p><p style="margin-top: 10px; margin-bottom: 0px; word-wrap: break-word; color: rgb(51, 51, 51); font-family: Arial, sans-serif;">함수들이 작동을 안하여 ~~ is not function 이라는 에러를 수없이 목격하는 경우가 있습니다. 여러 방법을 시도해본 결과 현재 &nbsp;</p><pre style="margin-top: 10px; margin-bottom: 0px; font-size: 14px;"><br><span data-mce-style="color: #cc7832;" style="color: rgb(204, 120, 50);">import </span><span data-mce-style="color: #6a8759;" style="color: rgb(106, 135, 89);">'jquery/dist/jquery'<br></span></pre><p style="margin-top: 10px; margin-bottom: 0px; word-wrap: break-word; color: rgb(51, 51, 51); font-family: Arial, sans-serif;"><br></p><p style="margin-top: 10px; margin-bottom: 0px; word-wrap: break-word; color: rgb(51, 51, 51); font-family: Arial, sans-serif;">이런식으로 해당 제이쿼리가 설치된 실제 경로의 파일을 직접 가져와 주입하니 정상적으로 작동하는것을 확인하였습니다. &nbsp;</p><p style="margin-top: 10px; margin-bottom: 0px; word-wrap: break-word; color: rgb(51, 51, 51); font-family: Arial, sans-serif;">만약 제이쿼리 함수가 없다는 에러를 보게 되면 이런식으로 직접경로를 주입해서 작업을 하면 됩니다.</p></div>
                </div>
             </div>
            <div class="board_comment_area">
                <header class="board_comment_area_header">
                    <div><span>댓글수 : </span><span>20</span></div>
                </header>
                <div class="board_comment_insert_area">
                    <input class="comment_input_box" type="text" placeholder="댓글을 입력해주세요.">
                    <div class="comment_input_box_send">댓글달기</div>
                </div>
                <div class="board_comment_lists">
                    <div class="board_comment_lists_body">
                        <div class="board_comment_lists_body_img">
                            <image src="/images/noimg.png"></image>
                        </div>
                        <div class="board_comment_lists_body_contents">
                            <span class="comment_writer">황아무개라구</span><span class="comment_date" >2016-12-31</span>
                            <div class="comment_content">
                                <p>이제까지 댓글을 게속 달면서 궁금했어요 뿌루룽 꾸리꾸리한 댓글을이 빠바바바</p>
                            </div>
                        </div>
                    </div>
                    <div class="board_comment_lists_sub">
                        <button>삭제</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="main_board_sidebar">

        </div>
    </div>
</div>
</body>
</html>