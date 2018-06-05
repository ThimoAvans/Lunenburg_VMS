<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class OntvangstmeldingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('leverancier', TextType::class);
        $builder
            ->add('datumontvangst', DateType::class); 
        $builder
            ->add('kwaliteit', ChoiceType::class, array(
            'choices' => array(
            'Groen' => "Groen",
            'Rood' => "Rood",)));        
        $builder
            ->add('Ontvangen', ChoiceType::class, array(
            'choices'  => array( 
            'Ja' => "Ontvangen",
            'Nee' => "Niet Ontvangen",)));                                                                                    	 
    }
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Ontvangstmelding', 
		));
	}
}

?>