<?php include('partials/menu.php'); ?>
<style>th{font-size:16px;font-weight:700;}
td{font-size:13px;text-align:center}</style>
<div class="main-content">
    <div class="wrapper2">
        <h1>Manage Food Order</h1>

                <br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br>

                <table class="tbl-full" style="border:1px solid white">
                    <tr style="text-align:center">
                        <th width="4%" style="text-align:center">#</th>
                        <th width="10%" style="text-align:center">Order Date</th>
                        <th width="10%" style="text-align:center">Food</th>
                        <th width="5%" style="text-align:center">Price</th>
                        <th width="3%" style="text-align:center">Qty</th>
                        <th width="10%" style="text-align:center">Total</th>
                        <th width="9%" style="text-align:center">Status</th>
                        <th width="10%" style="text-align:center">Customer</th>
                        <th width="10%" style="text-align:center">Contact</th>
                        <th width="10%" style="text-align:center">Email</th>
                        <th width="10%" style="text-align:center">Address</th>      
                        <th width="10%" style="text-align:center">Actions</th>
                        
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                
                                ?>

                                    <tr <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled
                                                
                                                if($status=="Ordered")
                                                {
                                                    echo "<label style='background-color: 	#bae1ff;'></label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='background-color: 	#ffdfba;'></label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='background-color: #baffc9;'><b></b></label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='background-color: #ffb3ba;'></label>";
                                                }
                                            ?>>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $order_date; ?></td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo "&nbsp;"?><?php echo $qty; ?></td>
                                        <td><?php echo '₹ '.$total; ?></td>
                                        

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled
                                                
                                                if($status=="Ordered")
                                                {
                                                    echo "$status";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "$status";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "$status";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "$status";
                                                }
                                            ?>
                                        </td>

                                        <td><b><?php echo $customer_name; ?></b></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" style="text-decoration:none; color:#272760;"><b>Update Order</b></a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>