<?php $student_id = $_POST['student_id'];
                    $connection = mysqli_connect("localhost:3307","root","");
                    $db = mysqli_select_db($connection,"aca");
					$query = "SELECT * FROM student WHERE student_id = {$student_id};";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run))
					{
?>
						<h4><b><u>Student's details</u></b></h4><br><br>
							<table>
								<tr>
									<td>
										<b>ID: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text" id="btn1" value="<?php echo $row['student_id']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Name: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['student_name']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Father's Name: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['student_parent']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Username: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['student_username']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Email: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['student_email']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Password: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="password"   id="btn1" value="<?php echo $row['student_password']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Index: &nbsp; &nbsp;&nbsp;</b>
									</td>
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['student_index']?>" disabled>
									</td>
								</tr>
							
							</table>
                            <?php

					}
				?>