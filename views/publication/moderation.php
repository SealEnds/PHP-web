
<h2>Publication List</h2>
<div>
    <?php $th_array = array("ID", "Category ID", "User's ID", "Title", "Img", "Views", "Visibility"); ?> 
    <?php while ($pub = $publications -> fetch_object()): ?>
        <table>
            <tr>
            <?php foreach($th_array as $key => $value): ?>
                <th><?=$value?></th>
            <?php endforeach; ?>
            </tr>
            <tr>
            <?php foreach($pub as $key => $value): ?>
                <?php if($key != 'content'): ?>
                    <td style="border: 1px solid black"><!--$key:--> <?=$value?></td>
                    <?php if($key == 'category_id'): ?>
                        <p>Category: <?=$categoriesToConsult[$value]->category_name?> </p>
                        <?php elseif($key == 'users_id'): ?>
                        <p>Username: <?=explode(' ', $usersToConsult[$value])[0]?> </p>
                        <p>Email: <?=explode(' ', $usersToConsult[$value])[1]?> </p>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            </tr>
        </table>
    <?php endwhile; ?>
</div>

<!-- <table>
        <?php // $th_array = array("ID", "Category ID", "Category", "User's ID", "Username", "Email", "Title", "Img", "Views", "Visibility"); ?> 
            <tr>
            <?php // foreach($th_array as $column): ?>
                <th>//$column</th>
            <?php //endforeach; ?>  
            </tr>
            
            <?php //while($pub = $publications -> fetch_object()): ?> 
                <tr style="border: 1px solid black">
                    <?php //foreach($pub as $key => $value): ?>
                        <?php //if($key != 'content'): ?>
                            <td style="border: 1px solid black">//$value</td>
                            <?php //if($key == 'category_id'): ?>
                                <p>Category: //$categoriesToConsult[$value]->category_name </p>
                            <?php //elseif($key == 'users_id'): ?>
                                <p>Username: //explode(' ', $usersToConsult[$value])[0] </p>
                                <p>Email: //explode(' ', $usersToConsult[$value])[1] </p>
                            <?php //endif; ?>
                        <?php //endif; ?>
                    <?php //endforeach; ?>
                </tr>
            <?php //endwhile; ?>
        <!-- <input type="button" value="Block Publications" />
        <input type="button" value="Block Comments" /> -->
    <!--</table> -->
