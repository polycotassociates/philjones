<?php

namespace Drupal\texas_migrate_programs;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * Modifies the language manager service.
 */
class TexasMigrateProgramsServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
      $modules = $container->getParameter('container.modules');

      if (isset($modules['csv_serialization'])) {
        $definition = $container->getDefinition('csv_serialization.encoder.csv');
        $definition->setClass('Drupal\texas_migrate_programs\Encoder\TexasMigrateProgramsCsvEncoder');
      }
    }
  }

  protected function formatValue($value) {
    $value = parent::formatValue($value);

    // Safely remove line breaks and excess spaces within content after other
    // processing.
    $value = preg_replace('/\s+/', ' ', trim($value));

    return $value;
  }
