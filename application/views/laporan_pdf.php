<div class="content-wrapper">
<div class="content-header">
<table class="table table-bordered">

            <tr style="background-color:gainsboro;">
                <th>#</th>
                <th>Jenis Surat</th>
                <th>Nomor</th>
                <th>Tgl</th>
                <th>Hal</th>
                <th>Asal</th>
                <th>Waktu Rekam</th>
                <th>Nama Rekam</th>
                <th>NIP Rekam</th>
                <th>Status</th>
                <th colspan="4" style="text-align:center;">AKSI</th>
            </tr>
            <?php
            $no = 1;
            foreach ($masuk as $m) : ?>
                <tr>
                    <td><?= ++$start; ?></td>
                    <td><?= $m->jenis_surat; ?></td>
                    <td><?= $m->nomor; ?></td>
                    <td><?= $m->tgl; ?></td>
                    <td><?= $m->hal; ?></td>
                    <td><?= $m->asal; ?></td>
                    <td><?= $m->waktu_rekam; ?></td>
                    <td><?= $m->nama_rekam; ?></td>
                    <td><?= $m->nip_rekam; ?></td>
                    <td><?= $m->status; ?></td>

                    <td><?= anchor('persuratan/edit/' . $m->id, '<div class="btn btn-info btn-sm ml-2"><i class="nav-icon fas fa-fw fa-edit"></i></div>
                       '); ?></td>

                    <td><?= anchor('persuratan/hapus/' . $m->id, ' <div class="btn btn-danger btn-sm ml-2"><i class="fas fa-fw fa-trash"></i></div>'); ?>

                    </td>

                </tr>
            <?php endforeach; ?>
        </table>    
</div>
</div>