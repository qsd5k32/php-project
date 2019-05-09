<div class="p-4">
    <div class="card mt-5">
        <div class="card-body">
            <table class="table ">

                <!--Table head-->
                <thead class="mdb-color darken-3">
                <tr class="text-white">
                    <th><i class="fa fa-tag"></i> Activite</th>
                    <th><i class="fa fa-calendar"></i> Date</th>
                    <th><i class="fa fa-map-marker"></i> Lieu</th>
                    <th><i class="fa fa-users"></i> Cible</th>
                </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                <?php

                $agenda = new Agenda();
                $agenda->showDate();
                while($date = $agenda->inf->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <th scope="row"><?= $date['activite'] ?></th>
                        <td><?= $date['date'] ?></td>
                        <td><?= $date['lieu'] ?></td>
                        <td><?= $date['cible'] ?></td>
                    </tr>
                    <?php
                }?>
                </tbody>
                <!--Table body-->

            </table>
        </div>
    </div>
</div>
