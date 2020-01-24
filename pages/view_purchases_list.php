

<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th > Product Name </th>
			<th > Quantity </th>
			<th > Cost </th>
			<th > Status </th>
		</tr>
	</thead>
	<tbody>
		
		<?php
		include('connect.php');
		$id=$_GET['iv'];
		$result = $db->prepare("SELECT * FROM purchases_item WHERE invoice= :userid");
		$result->bindParam(':userid', $id);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
				<td><?php
					$rrrrrrr=$row['name'];
					$resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
					$resultss->bindParam(':asas', $rrrrrrr);
					$resultss->execute();
					for($i=0; $rowss = $resultss->fetch(); $i++){
						echo $rowss['product_name'];
					}
					?></td>
					<td><?php echo $row['qty']; ?></td>
					<td>
						<?php
						$dfdf=$row['cost'];
						echo formatMoney($dfdf, true);
						?>
					</td>
					<td><?php echo $row['status']; ?></td>
				</tr>
				<?php
			}
			?>
			<tr>
				<td colspan="2"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
				 <th colspan="3" style="border-top:1px solid #999999"> 
					<?php
					function formatMoney($number, $fractional=false) {
						if ($fractional) {
							$number = sprintf('%.2f', $number);
						}
						while (true) {
							$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
							if ($replaced != $number) {
								$number = $replaced;
							} else {
								break;
							}
						}
						return $number;
					}
					$sdsd=$_GET['iv'];
					$resultas = $db->prepare("SELECT sum(cost) FROM purchases_item WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
						$fgfg=$rowas['sum(cost)'];
						echo formatMoney($fgfg, true);
					}
					?>
				</strong></td>
			</tr>

		</tbody>
	</table>