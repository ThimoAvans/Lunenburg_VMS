<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Controller\ArtikelController;
use AppBundle\Entity\Artikel;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;


class ArtikelType2 extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
         ->add('naam', TextType::class)
         ; 
         $builder
         ->add('omschrijving', TextType::class)
         ;
         $builder
         ->add('technischeSpecificaties', TextType::class)
         ;   
        $builder
         ->add('vervangendArtikel', TextType::class)
         ;                     
        $builder
         ->add('inkoopprijs', MoneyType::class) 
        ;              
        $builder
         ->add('minimumVoorraad', IntegerType::class) 
        ;       
        $builder
         ->add('huidigeVoorraad', IntegerType::class) 
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