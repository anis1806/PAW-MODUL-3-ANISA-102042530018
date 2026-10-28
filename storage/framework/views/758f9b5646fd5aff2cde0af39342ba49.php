<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Daftar Peminjaman</h2>
        <p class="text-muted mb-0">Kelola transaksi peminjaman dan pengembalian buku.</p>
    </div>
    <a href="<?php echo e(route('peminjaman.create')); ?>" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Peminjaman
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-3" style="width: 50px;">No</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th class="text-center">Status</th>
                        <th class="text-end pe-3" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    
                
                    
        <?php $__empty_1 = true; $__currentLoopData = $peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($item->anggota->nama); ?></td>
                <td><?php echo e($item->buku->judul); ?></td>
                <td><?php echo e($item->tanggal_pinjam); ?></td>
                <td><?php echo e($item->tanggal_kembali ?? '-'); ?></td>
                <td>
                    <span class="badge bg-<?php echo e($item->status == 'Dipinjam' ? 'warning' : 'success'); ?>">
                        <?php echo e($item->status); ?>

                    </span>
                </td>
                <td>
                    <?php if($item->status == 'Dipinjam'): ?>
                        <form action="<?php echo e(route('peminjaman.kembali', $item->id)); ?>"
                            method="POST"
                            onsubmit="return confirm('Konfirmasi pengembalian buku?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-success btn-sm">
                                Kembalikan
                            </button>
                        </form>
                    <?php else: ?>
                        <span class="text-muted">Sudah dikembalikan</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7" class="text-center">
                    Belum ada transaksi peminjaman.
                </td>
            </tr>
        <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
    <?php if($peminjaman->hasPages()): ?>
        <div class="card-footer bg-white py-3">
            <?php echo e($peminjaman->links('pagination::bootstrap-5')); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\PAW_MODUL3_ANISA_1020425300018\resources\views/peminjaman/index.blade.php ENDPATH**/ ?>