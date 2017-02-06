import React from "react";

var CommonList = React.createClass({
	render : function() {
		return <ul className="common-list report-list clear">
			{
				_.map(this.props.list,function(row,i){
					return <CommonListRow key={i} fields={this.props.fields} row={row} idx={this.props.idx} handleRowClick={this.props.handleRowClick}/>;
				}.bind(this))
			}
		</ul>
	}
});

var CommonListRow = React.createClass({
	handleRowClick : function() {
		this.props.handleRowClick(this.props.row[this.props.idx]);
	},
	handleIconClick : function(fieldName) {
		this.props.handleIconClick(fieldName,this.props.row[this.props.idx]);
	},
	render : function() {
		return (
			<li onClick={this.handleRowClick}>
				<ul className="list-row-content">
					{
						_.map(this.props.fields, function (field, i) {
							return <li key={i}>
								{field.icon ? <i className={field.icon} onClick={this.handleIconClick.bind(this,field.name)}></i> : <span className="field">{field.text}</span>}
								{this.props.row[field.name]}
							</li>;
						}.bind(this))
					}
				</ul>
			</li>
		);
	}
});

export default CommonList;