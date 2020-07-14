<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <table>
        <tr>
            <th>Jenis SUrat</th>
            <th>Nomor</th>
            <th>Tgl</th>
            <th>Hal</th>
            <th>Asal</th>
            <th>Waktu Rekam</th>
            <th>Nama Rekam</th>
            <th>NIP Rekam</th>
            <th>Status</th>
        </tr>
        <?php $no = 1;
        foreach ($masuk as $m) : ?>
            <tr>
                <td><?= $m->jenis_surat ?></td>
                <td><?= $m->nomor ?></td>
                <td><?= $m->tgl ?></td>
                <td><?= $m->hal ?></td>
                <td><?= $m->asal ?></td>
                <td><?= $m->waktu_rekam ?></td>
                <td><?= $m->nama_rekam ?></td>
                <td><?= $m->nip_rekam ?></td>
                <td><?= $m->status ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>