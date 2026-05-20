<?php
    include ("src/controller/candidatures/candidatures.php");
?> 
<div class="container">
    <h1 class="text-center">Candidatures</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>CV</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($candidatures as $candidature): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($candidature['nom']); ?></td>
                            <td><?php echo htmlspecialchars($candidature['prenom']); ?></td>
                            <td><?php echo htmlspecialchars($candidature['email']); ?></td>
                            <td><a href="<?php echo htmlspecialchars($candidature['cv']); ?>" target="_blank">Voir CV</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
