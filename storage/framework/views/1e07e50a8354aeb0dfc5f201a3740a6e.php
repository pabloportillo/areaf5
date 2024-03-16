<?php $__env->startSection('title', 'Detalles de Pokémon'); ?>

<?php $__env->startSection('header', 'Detalles de Pokémon'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nombre: <?php echo e($pokemon->name); ?></h5>
            <p class="card-text">Apodo: <?php echo e($pokemon->nickname); ?></p>
            <p class="card-text">ID de Usuario: <?php echo e($pokemon->user_id); ?></p>
            
            <?php if($equippedItem): ?>
                <p class="card-text">Objeto Equipado: <?php echo e($equippedItem); ?></p>
            <?php else: ?>
                <p class="card-text">No hay ningún objeto equipado.</p>
            <?php endif; ?>

        </div>
    </div>

    <form action="<?php echo e(route('pokemons.equip', $pokemon)); ?>" method="post" class="mt-4">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="item_type" class="form-label">Tipo de Objeto</label>
            <select name="item_type" id="item_type" class="form-select">
                <option value="berry">Baya</option>
                <option value="potion">Poción</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Equipar</button>
    </form>

    <div class="mt-4">
        <a href="<?php echo e(route('pokemons.index')); ?>" class="btn btn-secondary">Volver</a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pokemons/show.blade.php ENDPATH**/ ?>