<?php include_once __DIR__ . '/header_panel.php'?>
    <div class="team">
        <table class="team_table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>&#9660</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (count($users) === 1) {
                    foreach($users as $user) {?>
                        <tr class="member">
                            <td><?php echo $user->name;?></td>
                            <td><?php echo $user->email;?></td>
                            <td>Unico usuario</td>
                        </tr>
                    <?php }

                    } else{
                        foreach($users as $user) {?>
                        <tr class="member">
                            <td><?php echo $user->name;?></td>
                            <td><?php echo $user->email;?></td>
                            <td>
                                <form method="POST" action="/eliminar_miembro">
                                    <button type="button" class="remove_btn" onclick="deleteUser_confirmation(this)" data-user-id="<?php echo $user->id ?>">
                                        <p class="mobile">X</p>
                                        <p class="p_tablet">Remover</p>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php }
                }?>
            </tbody>
        </table>
        <div class="invite_text">
            <h4>Invita Colaboradores</h4>
            <p>Si deseas invitar colaboradores a formar parte de tu equipo puedes escribir el email de la persona acá abajo</p>
        </div>
        <form action="/equipo" method="POST" class="form" novalidate>
            <div class="field">
                <label for="email_invitation" class="wider">Email:</label>
                <input type="email" name="email_invitation" id="email" placeholder="Email de la persona">
            </div>

            <input type="submit" class="button" value="Invitar">
        </form>
    </div>
<?php include_once __DIR__ . '/footer_panel.php'?>