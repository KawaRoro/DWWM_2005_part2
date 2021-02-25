<?php
function additionner($a, $b)
{
  if (!is_numeric($a) || !is_numeric($b))
  {
    // On lance une nouvelle exception grâce à throw et on instancie directement un objet de la classe Exception.
    throw new Exception('Les deux paramètres doivent être des nombres');
  }
  
  return $a + $b;
}

echo additionner(12, 3), '<br />';
echo additionner('azerty', 54), '<br />';
echo additionner(4, 8);