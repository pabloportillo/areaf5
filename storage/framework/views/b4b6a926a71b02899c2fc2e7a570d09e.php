<?php $__env->startSection('title', 'Agregar Pokémon Capturado'); ?>
<?php $__env->startSection('header', 'Agregar un Pokémon capturado'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container"> 
        <form action="<?php echo e(route('pokemons.store')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <select id="pokemon_select" name="pokemon_id" class="selectpicker" data-live-search="true">
                <option value="">-- Selecciona un Pokémon --</option>
                <?php $__currentLoopData = $pokemons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pokemon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pokemon->id); ?>" data-tokens="<?php echo e($pokemon->name); ?>"><?php echo e($pokemon->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <div class="form-group">
                <label for="nickname">Apodo:</label>
                <input type="text" name="nickname" id="nickname" class="form-control">
            </div>

            <div class="form-group">
                <label for="user_id">Usuario:</label>
                <select name="user_id" id="user_id" class="form-select"> 
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <main class="container text-center pt-4 pb-4">
                <button type="submit" class="btn btn-primary">Agregar Pokémon</button>
            </main>

        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pokemons/create.blade.php ENDPATH**/ ?>