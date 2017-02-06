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
        @media (max-width: 960px){
            #main_header {  position: relative;  width: 100%;}
            #main_area{width: 100%;margin-left: 0em;margin-right: 0em;}
            .article_list {width: 100%;padding: 0;}
            .toggle_menu_button{width: 100%;padding:1em 1.5em;background-color: #dd4c39;border-radius: 4px; color: #fff;display: block;}
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
        <header class="area_header">
            <div class="area_header_title">
                <h1>게시판 카테고리명</h1>
            </div>
        </header>
        <div class="area_content">
            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>
            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>
            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>
            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>
            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>
            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>
            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>
            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>
            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>
            <article class="article_list">
                <div class="article_list_item">
                    <img src="https://velopert.com/wp-content/uploads/2016/09/이미지-6-450x255.png">
                    <div class="article_list_item_content">
                        <div class="article_title">
                            <p>제목들입니다</p>
                        </div>
                        <div class="article_footer">
                            <span class="article_date">2016-01-01</span>
                            <span class="article_comment">comments : 0</span>
                        </div>
                    </div>

                </div>
            </article>


        </div>
    </div>
</div>
</body>
</html>