import React from "react";
import ReactDOM from "react-dom";
import { Router, Route, IndexRoute, hashHistory } from "react-router";

import Main from "./components/Layout";

/* pages */
import Approval from "./pages/Approval";
import Config from "./pages/Config";
import Home from "./pages/Home";
import Member from "./pages/Member";
import Stats from "./pages/Stats";

const main = document.getElementById('main');

ReactDOM.render(
	<Router history={hashHistory}>
		<Route path="/" component={Main}>
			<Route path="home" name="home" component={Home} title="홈"></Route>
			<Route path="member" name="member" component={Member} title="인사관리"></Route>
			<Route path="approval" name="approval" component={Approval} title="전자결재"></Route>
			<Route path="stats" name="stats" component={Stats} title="교세통계"></Route>
			<Route path="config" name="config" component={Config} title="환경설정"></Route>
		</Route>
	</Router>,
main);