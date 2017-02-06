import React from "react";

import CommonModal from "../components/Common/Modal";

var ConfirmTempUserModal = React.createClass({
	handleConfirm : function(e) {
		if(this.refs.birthday.value == ""){
			alert('생년월일을 입력해 주세요');
			this.refs.birthday.focus();
		}else if(this.refs.userPhone.value == ""){
			alert('휴대폰번호를 입력해 주세요.');
			this.refs.userPhone.focus();
		}else{
			$.ajax({
				type:'post',
				url:'/flat_home/main/check_temp_user_phone',
				data:{
					churchCode:churchCode,
					birthday:this.refs.birthday.value,
					birthSolar:this.refs.birthSolar.value,
					userPhone:this.refs.userPhone.value
				},
				dataType:'json'
			}).done(function(result){
				if(result.status < 1){
					alert("교적부에 등록된 정보와 다릅니다. 다시 확인해 주세요.");
					return;
				} else if(result.status == 1) {
					this.props.handleModalClick('addUser',{});
				} else if(result.status == 2) {
					this.props.handleModalClick('confirmLinkUser',{userId:result.info.user_id});
				}
				this.hide();
			}.bind(this));
		}
		e.preventDefault();
	},
	handleBirthdayBlur : function() {
		var numbers = this.refs.birthday.value;
		if(numbers == ''|| numbers == null || numbers == '0000-00-00' || numbers == '-00-00') {
			this.refs.birthday.value = "";
			return;
		}

		var formatted_numbers = null;
		if(numbers.length === 6) {
			if(/^(0?[012][0-9])$/.test(numbers.substring(0,2))) {
				formatted_numbers = numbers.replace(/(\d{2})[^\d]*(\d{2})[^\d]*(\d{2})/,'20$1-$2-$3');
			} else {
				formatted_numbers = numbers.replace(/(\d{2})[^\d]*(\d{2})[^\d]*(\d{2})/,'19$1-$2-$3');
			}
		} else if(numbers.length === 4) {
			formatted_numbers = numbers.replace(/(\d{4})/,'$1-00-00');
		} else {
			formatted_numbers = numbers.replace(/(\d{4})[^\d]*(\d{2})[^\d]*(\d{2})/,'$1-$2-$3');
		}

		if(/^\d{4}[-](0?[0-9]|1[012])[-](0?[0-9]|[12][0-9]|3[01])$/.test(formatted_numbers) === false){
			formatted_numbers = "";
			alert('날짜범위가 맞지 않습니다.');
			this.ref.sbirthday.focus();
		}

		this.refs.birthday.value = formatted_numbers;
	},
	show : function() {
		this.refs.commonModal.show();
	},
	hide : function() {
		this.refs.commonModal.hide();
	},
	render : function() {
		return <CommonModal ref="commonModal" style={{width:"365px"}} title="관리자 생성 진행중" footer={true} handleConfirm={this.handleConfirm} >
			<div className="modal-body passwd-reset-body">
				<p>*기본정보입력</p>
				<p>교적 아이디 생성을 위한 인증 절차입니다.<br/>교적부의 생년월일과 핸드폰번호를 정확히 입력해주세요.</p>
				<table className="table-password-reset">
					<colgroup>
						<col style={{width:"80px"}}/>
						<col />
					</colgroup>
					<tbody>
					<tr>
						<th>생년월일</th>
						<td>
							<input type="text" ref="birthday" name="birthday" placeholder="1988-10-01" onBlur={this.handleBirthdayBlur}/>
							<select ref="birthSolar" name="birthSolar">
								<option value="2">양</option>
								<option value="1">음</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>휴대폰번호</th>
						<td><input type="text" ref="userPhone" name="userPhone"/></td>
					</tr>
					</tbody>
				</table>
			</div>
		</CommonModal>;
	}
});

var AddUserModal = React.createClass({
	getInitialState : function() {
		return {idOk:false,idComment:""};
	},
	handleConfirm : function(e) {
		var regex = /^.*(?=^.{4,15}$)(?=.*\d)(?=.*[a-zA-Z]).*$/;
		if(this.refs.userId.value == ""){
			alert('아이디를 입력해 주세요.');
			this.refs.userId.focus();
		} else if(this.refs.passwd.value == ""){
			alert('비밀번호를 입력해 주세요.');
			this.refs.passwd.focus();
		} else if (!regex.test(this.refs.passwd.value)) {
			alert("영문,숫자 포함하여 4자 이상 비밀번호로 입력해 주세요");
		} else if(this.refs.passwd.value !== this.refs.passwdConfirm.value){
			alert('동일한 비밀번호를 입력해 주세요.');
			this.refs.passwdConfirm.focus();
		} else{
			$.ajax({
				type:'post',
				url:'/flat_home/main/add_user',
				data:{
					churchCode:churchCode,
					userId:this.refs.userId.value,
					userPasswd:this.refs.passwd.value
				},
				dataType:'json'
			}).done(function(result){
				if(result.status != 1) {
					alert("등록중 문제가 발생되었습니다. 다시 처음부터 진행해주세요.");
					this.hide();
				}
				alert(result.msg);
				this.hide();
			}.bind(this));
		}
		e.preventDefault();
	},
	handleUserIdBlur : function() {
		if(this.refs.userId.value == "")
			return;

		$.ajax({
			type:'get',
			url:'/flat_home/main/check_duplicate_id',
			data:{userId:this.refs.userId.value},
			dataType:'text'
		}).done(function(result){
			if(result == 'ok')
				this.setState({idOk:true,idComment:<p style={{color:"#29C466"}}>사용할 수 있는 아이디입니다.</p>});
			else
				this.setState({idOk:false,idComment:<p style={{color:"#FA6154"}}>이미 등록되어 있는 아이디입니다.</p>});
		}.bind(this));
	},
	show : function() {
		this.refs.commonModal.show();
	},
	hide : function() {
		this.refs.commonModal.hide();
	},
	render : function() {
		return <CommonModal ref="commonModal" style={{width:"365px"}} footer={true} title="관리자 생성 진행중" handleConfirm={this.handleConfirm} >
			<div className="modal-body">
				<form id="passwd_reset_form" ref="passwdResetForm" method="post" action="/" onSubmit={this.handleConfirm}>
					<p>*문자/메일로 발급된 임시 아이디 대신<br/> 새로운 아이디로 변경해주세요.<br/></p>
					<p>*사용할 아이디/비밀번호를 입력해 주세요.<br/>한번 지정된 아이디는 변경 불가합니다.</p>
					<table className="table-password-reset">
						<colgroup>
							<col style={{width:"80px"}}/>
							<col />
						</colgroup>
						<tbody>
						<tr>
							<th>아이디</th>
							<td>
								<input type="text" ref="userId" name="userId" onBlur={this.handleUserIdBlur}/>
								<p>{this.state.idComment}</p>
							</td>
						</tr>
						<tr>
							<th>새비밀번호</th>
							<td><input type="password" ref="passwd" name="newPasswd" /></td>
						</tr>
						<tr>
							<th>새비밀번호확인</th>
							<td><input type="password" ref="passwdConfirm" name="passwdConfirm"/></td>
						</tr>
						</tbody>
					</table>
				</form>
			</div>
		</CommonModal>;
	}
});

var ConfirmLinkUserModal = React.createClass({
	getInitialState : function() {
		return {userId:""};
	},
	handleConfirm : function(e) {
		$.ajax({
			type:'post',
			url:'/flat_home/main/confirm_link_user',
			data:{churchCode:churchCode,userId:this.state.userId},
			dataType:'json'
		}).done(function(result){
			alert(result.msg);
			this.hide();
		}.bind(this));

		e.preventDefault();
	},
	show : function() {
		this.refs.commonModal.show();
	},
	hide : function() {
		this.refs.commonModal.hide();
	},
	render : function() {
		return <CommonModal ref="commonModal" style={{width:"365px"}} title="관리자 생성 진행중" footer={true} handleConfirm={this.handleConfirm} >
			<div className="modal-body passwd-reset-body">
				<p>기존에 가입되어 있던 아이디가 있습니다.<br/>아래의 아이디와 연동하겠습니다</p>
				<div style={{width:"120px",height:"40px",lineHeight:"40px",margin:"0 auto",textAlign:"center",fontWeight:"bold"}}>
					{this.state.userId}
				</div>
			</div>
		</CommonModal>;
	}
});

export {
	ConfirmTempUserModal,
	AddUserModal,
	ConfirmLinkUserModal,
};