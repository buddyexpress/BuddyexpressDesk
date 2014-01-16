body {
padding-bottom: 10px;
position: relative;
z-index: 2;
background: none repeat scroll 0 0;
line-height:1.5;
font-family: 'PT Sans', sans-serif;
color:#000;
background:#F7F7F7;
font-size:10pt;
margin:0;
}
#buddyexpressdesk-page-menubar{
	width: 100%;
	margin: 0;
	padding: 10px 0 0 0;
	list-style: none;  
	background: #111;
	background: -moz-linear-gradient(#444, #111); 
        background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #111),color-stop(1, #444));	
	background: -webkit-linear-gradient(#444, #111);	
	background: -o-linear-gradient(#444, #111);
	background: -ms-linear-gradient(#444, #111);
	background: linear-gradient(#444, #111);
	-moz-border-radius: 50px;
	border-radius: 50px;
	-moz-box-shadow: 0 2px 1px #9c9c9c;
	-webkit-box-shadow: 0 2px 1px #9c9c9c;
	box-shadow: 0 2px 1px #9c9c9c;
}

#buddyexpressdesk-page-menubar li{
	float: left;
	padding: 0 0 10px 0;
	position: relative;
}

#buddyexpressdesk-page-menubar a{
	float: left;
	height: 25px;
	padding: 0 25px;
	color: #999;
	text-transform: uppercase;
	font: bold 12px/25px Arial, Helvetica;
	text-decoration: none;
	text-shadow: 0 1px 0 #000;
}

#buddyexpressdesk-page-menubar li:hover > a{
	color: #fafafa;
}

*html #buddyexpressdesk-page-menubar li a:hover{ /* IE6 */
	color: #fafafa;
}

#buddyexpressdesk-page-menubar li:hover > ul{
	display: block;
}

#buddyexpressdesk-page-menubar:after{
	visibility: hidden;
	display: block;
	font-size: 0;
	content: " ";
	clear: both;
	height: 0;
}

* html #buddyexpressdesk-page-menubar             { zoom: 1; } /* IE6 */
*:first-child+html #buddyexpressdesk-page-menubar { zoom: 1; } /* IE7 */
.buddyedesk-default {
  width: 1000px;
  margin: 0 auto;		
}

.buddyexpresss-logo {
	background:url("<?php echo Bdesk_url(); ?>images/buddyexpress_logo.jpg") no-repeat;
	width:615px;
	height:129px;
}	
.buddyexpresss-search-box {
	background:url("<?php echo bframework_get_url(); ?>application/searchdisable.jpg") no-repeat;
	width:323px;
	height:65px;
}	
.buddydesk-top {
margin: 15px auto;
width: 950px;
margin-bottom:-35px;
}
.buddydesk-top .inline{
	display:inline-block;
}
.search {
float: right;
margin-top: 30px;
margin-right: 10px;
}

.layout-article {
background-color: #FFF;
min-height: 300px;
width: 920px;
margin: 20px;
border-radius: 5px;
border: 2px solid #EEE;	
padding: 20px;
}
.layout-article h2 {
		color:#428BCA;
	font-size: 15px;
}

.button-nav-default {
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.2);
-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
}
.button-nav {
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
text-decoration:none;
cursor:pointer;
font-size: 14px;
font-weight: bold;
line-height: 1.428571429;
text-align: center;
white-space: nowrap;
vertical-align: middle;
cursor: pointer;
border: 1px solid rgba(0, 0, 0, 0.38);;
border-radius: 4px;
color:#333;
}
.button-nav:active {
	background:#E6E6E6;
}
.button-blue {
  cursor: pointer;
  display: inline-block;
  background-color: #e6e6e6;
  background-repeat: no-repeat;
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), color-stop(25%, #ffffff), to(#e6e6e6));
  background-image: -webkit-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  background-image: -moz-linear-gradient(top, #ffffff, #ffffff 25%, #e6e6e6);
  background-image: -ms-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  background-image: -o-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  background-image: linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
  padding: 5px 14px 6px;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  color: #333;
  font-size: 13px;
  line-height: normal;
  border: 1px solid #ccc;
  border-bottom-color: #bbb;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  -webkit-transition: 0.1s linear all;
  -moz-transition: 0.1s linear all;
  -ms-transition: 0.1s linear all;
  -o-transition: 0.1s linear all;
  transition: 0.1s linear all;
}
.button-blue:hover {
  background-position: 0 -15px;
  color: #333;
  text-decoration: none;
}
.button-blue:focus {
  outline: 1px dotted #666;
}
.button-blue.primary {
  color: #ffffff !important;
  background-color: #0064cd;
  background-repeat: repeat-x;
  background-image: -khtml-gradient(linear, left top, left bottom, from(#049cdb), to(#0064cd));
  background-image: -moz-linear-gradient(top, #049cdb, #0064cd);
  background-image: -ms-linear-gradient(top, #049cdb, #0064cd);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #049cdb), color-stop(100%, #0064cd));
  background-image: -webkit-linear-gradient(top, #049cdb, #0064cd);
  background-image: -o-linear-gradient(top, #049cdb, #0064cd);
  background-image: linear-gradient(top, #049cdb, #0064cd);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#049cdb', endColorstr='#0064cd', GradientType=0);
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  border-color: #0064cd #0064cd #003f81;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
input[type=text] {
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  -o-transition: all 0.30s ease-in-out;
  outline: none;
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid #eee;
  width: 400px; 
  height: 30px;
  padding: 10px;
  font-weight:bold;
  color:#999;
}
input[type=text]:focus, textarea:focus {
  box-shadow: 0 0 5px rgb(202, 202, 202);
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  padding: 10px;
  border: 1px solid rgb(202, 202, 202);
  font-weight:bold;
  color:#999;
}

input[type=text] {
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  -o-transition: all 0.30s ease-in-out;
  outline: none;
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid #eee;
  width: 400px; 
  height: 30px;
  padding: 10px;
  font-weight:bold;
  color:#999;
}
input[type=text]:focus, textarea:focus {
  box-shadow: 0 0 5px rgb(202, 202, 202);
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  padding: 10px;
  border: 1px solid rgb(202, 202, 202);
  font-weight:bold;
  color:#999;
}
.bframework-success{padding:2px;border:1px solid #00cc00;background:#ccffcc}
.bframework-fail{padding:2px;border:1px solid #A02134;background:#FD8C8F}
.bframework_msg{
margin-top: 10px;
min-height: 40px;
padding: 10px;}