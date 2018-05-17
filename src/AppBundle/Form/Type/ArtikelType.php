<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use AppBundle\Controller\DefaultController;
use AppBundle\Controller\ArtikelController;
use AppBundle\Entity\Artikel;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;


class ArtikelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $builder
        // ->add('id', IntegerType::class) 
        // ;
        // $builder
        // ->add('artikelnummer', IntegerType::class) 
        // ;
        // $builder
        // ->add('magazijnlocatie', EntityType::class, array(
        // 'class' => 'AppBundle:Artikel',
        // 'choice_label' => 'magazijnlocatie'))
        // ;
        $builder
         ->add('magazijnlocatie', TextType::class)
         ;        
         $builder
         ->add('technischeSpecificaties', TextType::class)
         ;        
         $builder
         ->add('omschrijving', TextType::class)
         ;       
         $builder
        ->add('inkoopprijs', IntegerType::class) 
        ;         
        $builder
         ->add('vervangendArtikel', TextType::class)
         ;         
         $builder
        ->add('minimumVoorraad', IntegerType::class) 
        ;       
         $builder
        ->add('huidigeVoorraad', IntegerType::class) 
        ;          
        $builder
        ->add('bestelserie', IntegerType::class) 
        ;
//         $builder->add('magazijnlocatie', ChoiceType::class, array(
//     'choices' => array(
//         '1' => 'en',
//         '2' => 'es',
//         '3'   => 'muppets',
//         '4' => 'arr',
//     )
// ));
//         $builder->add('gegevens wissen', ResetType::class, array(
//     'attr' => array('class' => 'save'),
// ));

        //         $builder
        //     ->add('magazijnlocatie', ChoiceType::class, [
        //         'choices' => array([
        // '1' => 'en',
        // '2' => 'es',
        // '3'   => 'muppets',
        // '4' => 'arr',
        //         ]),
        //         'expanded'  => true,
        //         'multiple'  => true,
        //     ])
        //     ->add('save', SubmitType::class)
        // ;


		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Artikel', 
		));
	}
}

?>