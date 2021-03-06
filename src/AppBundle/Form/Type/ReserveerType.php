<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Controller\ArtikelController;
use AppBundle\Entity\Artikel;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class ReserveerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {    
        $builder
         ->add('gereserveerdeVoorraad', IntegerType::class) 
        ;          
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Artikel', 
		));
	}
}

?>