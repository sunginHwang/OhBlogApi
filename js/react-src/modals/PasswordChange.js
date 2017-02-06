import React from "react";

import CommonModal from "../components/Common/Modal";

var PasswordChange = React.createClass({
	handleConfirm : function(e) {
		var regex = /^.*(?=^.{4,15}$)(?=.*\d)(?=.*[a-zA-Z]).*$/;
		if(this.refs.passwd.value == ""){
			alert('비밀번호를 입력해 주세요.');
			this.refs.passwd.focus();
		} else if(this.refs.newPasswd.value == ""){
			alert('새 비밀번호를 입력해 주세요.');
			this.refs.newPasswd.focus();
		} else if (!regex.test(this.refs.newPasswd.value)) {
			alert("영문,숫자 포함하여 4자 이상 비밀번호로 입력해 주세요");
		} else if(this.refs.newPasswd.value !== this.refs.passwdConfirm.value){
			alert('동일한 비밀번호를 입력해 주세요.');
			this.refs.passwdConfirm.focus();
		} else{
			$.ajax({
				type:'post',
				url:'/main/change_passwd_in',
				data:{
					userPasswd:this.refs.passwd.value,
					newPasswd:this.refs.newPasswd.value
				},
				dataType:'json'
			}).done(function(result){
				alert(result.msg);
				if(result.status > 0) {
					this.hide();
				}
			}.bind(this));
		}
		e.preventDefault();
	},
	show : function() {
		this.refs.passwd.value = null;
		this.refs.newPasswd.value = null;
		this.refs.passwdConfirm.value = null;
		this.refs.commonModal.show();
	},
	hide : function() {
		this.refs.commonModal.hide();
	},
	render : function() {
		return <CommonModal ref="commonModal" style={{width:"365px"}} footer={true} title="비밀번호 재설정" handleConfirm={this.handleConfirm} >
			<div className="modal-body">
				<form id="passwd_reset_form" ref="passwdResetForm" method="post" action="/" onSubmit={this.handleConfirm}>
					<table className="table-password-reset">
						<colgroup>
							<col style={{width:"120px"}}/>
							<col />
						</colgroup>
						<tbody>
						<tr>
							<th>기존비밀번호</th>
							<td><input type="password" ref="passwd" name="oldPasswd" /></td>
						</tr>
						<tr>
							<th>새비밀번호</th>
							<td><input type="password" ref="newPasswd" name="newPasswd" /></td>
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

export default PasswordChange;