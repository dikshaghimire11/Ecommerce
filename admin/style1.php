
:root{
	--main-color:#4a8ab5;
	--color-dark:#1D2231;
	--text-gray:#8390A2;
}
* {
	padding: 0;
	margin:5;
	box-sizing: border-box;
	list-style-type: none;
	text-decoration: none;
	font-family: 'Roboto Slab', serif;
}
.sidebar
{
	width: 260px;
	position: fixed;
	left: 0;
	top: 0;
	height: 100%;
	background: var(--main-color);
	border-radius:10px;
}
img{
	width:75px;
	height: 50px;
	border-radius:10px;
}

.sidebar-brand{
	height: 90px;
	padding: 1rem 0rem 1rem 2rem;
}

.sidebar-brand span{
	display: inline-block;
	padding-right: 1rem;
}

.sidebar-menu li{
	width: 100%;
	margin-left: 1.2rem;
	padding-left: 1rem;
}

.sidebar-menu  ul li a{
	padding-left: 1rem;
	display: block;
	 color: #fff; 
	font-size: 1.6rem;
}
 ul li a:hover{
	color:Black;
} 
 .sidebar-menu a.active{
 	padding-top: 1rem;
 }
.sidebar-menu a span:first-child{
	font-size: 1.5rem; 
	padding-right: 1rem;
}

.main-content{
	margin-left: 345px;
}
header{
	display: flex;
	justify-content: space-between;
	padding: 1rem;
}
.sidebar-menu-try ul li a{
font-size: 1.2rem;	
color: #fff; 
}
.sidebar-menu-try a:hover{
	color: black;
	background-color: white;
	border-radius: 10px;
	width: 170px;
}