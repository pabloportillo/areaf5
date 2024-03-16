<?php $__env->startSection('title', 'Listado de Pokémon Capturados'); ?>
<?php $__env->startSection('header', 'Listado de Pokémons Capturados'); ?>

<?php $__env->startSection('content'); ?>
<div class="container"> 

    <main class="container text-center pt-4 pb-4">
        <a href="<?php echo e(route('pokemons.create')); ?>" class="btn btn-primary d-inline-block">Agregar Pokémon</a>
    </main>

    <?php if($pokemons->count()): ?>
        <div class="pokemon-list"> 
            <?php $__currentLoopData = $pokemons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pokemon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-4 mx-auto" style="max-width: 300px;"> 
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($pokemon->name); ?></h5>
                        <p class="card-text">Fecha de captura: <?php echo e($pokemon->created_at->format('d/m/Y')); ?></p>
                        <p class="card-text">Dummy: 
                           <span class="<?php echo e($pokemon->dummy ? 'text-success' : 'text-danger'); ?>">
                               <?php echo e($pokemon->dummy ? 'No' : 'Si'); ?> 
                           </span> 
                        </p>
                        <p class="card-text">Objeto Equipado: 
                            <?php if($pokemon->equippable_type): ?>
                                <?php echo e(ucfirst($pokemon->equippedItem->getMorphClass())); ?>

                            <?php else: ?>
                                No hay objeto equipado
                            <?php endif; ?>
                        </p>
                        <td>
                            <a href="<?php echo e(route('pokemons.show', $pokemon)); ?>">Ver detalles</a>
                        </td>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <nav class="mt-4 d-flex justify-content-center"> 
            <?php echo e($pokemons->links('pagination::bootstrap-4')); ?>

        </nav>

    <?php else: ?>
        <p class="text-center">No hay Pokémon registrados aún.</p> 
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pokemons/index.blade.php ENDPATH**/ ?>