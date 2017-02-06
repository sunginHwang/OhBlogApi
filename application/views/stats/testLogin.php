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

        /*로그인 영역*/
        .member_area{width: 40%;background-color: #fff;border-radius: 9px;}
        .member_component{border:1px solid #e8e8e8;padding: 1em;}
        .member_title{    text-align: center;  padding-bottom: 1em;  border-bottom: 1px solid #e8e8e8;margin: 0 -1em 0 -1em;}
        .member_info_area {padding: 0 1em 0 1em;}
        .member_info_area > input {width: 100%;border: 1px solid #e8e8e8;display: block;font-size: 1em;padding: 0.5em;}
        .member_info_area .member_submit_btn{margin-top: 1em;  width: 100%;  padding: 1em;  border-radius: 4px;  background-color: #dd4c39; color:#fff;border: none;}
        .member_info_area .input_id {border-bottom: 0;}
        .member_input_contents {padding-top: 1em;}

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
            /*로그인.login_area 영역*/
            .member_area.login_area{width: 100%;}
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
        <div class="member_area">
            <div class="member_component">
                <header><div class="member_title"><p>로그인</p></div></header>
                <div class="member_input_contents">
                    <div class="member_info_area">
                        <input class="input_id" type="text" placeholder="id" />
                        <input class="input_pwd" type="password" placeholder="pwd"/>
                        <button class="member_submit_btn">로그인</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>