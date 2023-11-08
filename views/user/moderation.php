<h2>Users Moderation</h2>

<div>
    Buscador
</div>

<div class="display-block">

    <table>
        <?php $th_array = array("ID", "User Name", "Surname", "User Permits", "email", "Location", "Profile Image", "Hiring Info", "Registration"); ?> 
            <tr>
            <?php foreach($th_array as $column): ?>
                <th><?=$column?></th>
            <?php endforeach; ?>  
            </tr>
            
            <?php while($u = $users -> fetch_object()): ?> 
                <tr style="border: 1px solid black">
                    <?php foreach($u as $key => $value): ?>
                        <?php if($key != 'user_password'): ?>
                            <td style="border: 1px solid black"><?=$value?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endwhile; ?>
        <!-- <input type="button" value="Block Publications" />
        <input type="button" value="Block Comments" /> -->
    </table>


    
</div>