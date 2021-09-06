<!DOCTYPE html>
<html>
<head>
	<title>Project Test</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body
{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #161623;
}
body::before
{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#f00,#f0f);
    clip-path: circle(30% at right 70%);
}
body::after
{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#2196f3,#e91e63);
    clip-path: circle(30% at 10% 10%);
}
.container{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 1200px;
    flex-wrap: wrap;
    z-index: 1;
}
.container .card
{
    position: relative;
    width: 350px;
    height: 280px;
    margin: 30px;
    box-shadow: 20px 20px 50px rgba(0,0,0, 0.5);
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1);
    overflow: hidden;
    justify-content: center;
    align-items: center;
    border-top: 1px solid rgba(255, 255, 255, 0.5);
    border-left: 1px solid rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(5px);

}

.container .card .content
{
    margin-top: 20%;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
	color: white;
}
td{
    align-items: center;
}

/*.container .card .content
{
    padding: 20px;
    text-align: center;
    transform: translateY(100px);
    opacity: 0;
    transition: 0.5s;
}
.container .card:hover .content{
    transform: translateY(0px);
    opacity: 1;
}*/

	</style>
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="content">
		<form action="<?php echo base_url('auth/register'); ?>" method="post">		
		<table width="100%" border="1">
			<tr >
				<td width="30%"><font color="white">No Induk</font></td>
				<td align="center"><input type="text" name="reg_number" id="reg_number" value="<?= set_value('reg_number'); ?>">
				<small>	<?= form_error('reg_number');  ?></small>
				<input type="hidden" name="level" id="level" value="admin">
				</td>
			</tr>
			<tr >
				<td width="30%"><font color="white">Nama</font></td>
				<td align="center"><input type="text" name="name" id="name" value="<?= set_value('name'); ?>">
				<small>	<?= form_error('name');  ?></small>
				</td>
			</tr>

			<tr>
				<td><font color="white">Password</font></td>
				<td align="center"><input type="password" name="password" id="password">
					<small><?= form_error('password');  ?></small></td>
			</tr>
			
			<tr>
				<td></td>
				<td align="center">
					<button type="submit" name="register">Register</button>
				</td>
			</tr>
		</table>
	</form>
	</div>
	</div>
	</div>
	</body>
</html>
