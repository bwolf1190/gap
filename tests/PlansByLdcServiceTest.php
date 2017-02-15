<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlansByLdcServiceTest extends TestCase
{
	
	/** @test */
	public function return_plans_for_bge_residential(){
		$bge_plans = \App\Models\Plan::where('ldc', 'BGE')->where('type', 'Residential')->get();
		
		foreach($bge_plans as $plan){
			$this->assertEquals('BGE', $plan->ldc);
			$this->assertEquals('Residential', $plan->type);
		}
	}

	/** @test */
	public function return_plans_for_bge_commercial(){
		$bge_plans = \App\Models\Plan::where('ldc', 'BGE')->where('type', 'Commercial')->get();
		
		foreach($bge_plans as $plan){
			$this->assertEquals('BGE', $plan->ldc);
			$this->assertEquals('Commercial', $plan->type);
		}
	}


	/** @test */
	public function return_plans_for_duquesne_residential(){
		$duquesne_plans = \App\Models\Plan::where('ldc', 'Duquesne')->where('type', 'Residential')->get();
		
		foreach($duquesne_plans as $plan){
			$this->assertEquals('Duquesne', $plan->ldc);
			$this->assertEquals('Residential', $plan->type);
		}
	}

	/** @test */
	public function return_plans_for_duquesne_commercial(){
		$duquesne_plans = \App\Models\Plan::where('ldc', 'Duquesne')->where('type', 'Commercial')->get();
		
		foreach($duquesne_plans as $plan){
			$this->assertEquals('Duquesne', $plan->ldc);
			$this->assertEquals('Commercial', $plan->type);
		}
	}

	/** @test */
	public function return_plans_for_meted_residential(){
		$meted_plans = \App\Models\Plan::where('ldc', 'MetEd')->where('type', 'Residential')->get();
		
		foreach($meted_plans as $plan){
			$this->assertEquals('MetEd', $plan->ldc);
			$this->assertEquals('Residential', $plan->type);
		}
	}

	/** @test */
	public function return_plans_for_meted_commercial(){
		$meted_plans = \App\Models\Plan::where('ldc', 'MetEd')->where('type', 'Commercial')->get();
		
		foreach($meted_plans as $plan){
			$this->assertEquals('MetEd', $plan->ldc);
			$this->assertEquals('Commercial', $plan->type);
		}
	}

	/** @test */
	public function return_plans_for_peco_residential(){
		$peco_plans = \App\Models\Plan::where('ldc', 'PECO')->where('type', 'Residential')->get();
		
		foreach($peco_plans as $plan){
			$this->assertEquals('PECO', $plan->ldc);
			$this->assertEquals('Residential', $plan->type);
		}
	}

	/** @test */
	public function return_plans_for_peco_commercial(){
		$peco_plans = \App\Models\Plan::where('ldc', 'PECO')->where('type', 'Commercial')->get();
		
		foreach($peco_plans as $plan){
			$this->assertEquals('PECO', $plan->ldc);
			$this->assertEquals('Commercial', $plan->type);
		}
	}

	/** @test */
	public function return_plans_for_pepco_residential(){
		$pepco_plans = \App\Models\Plan::where('ldc', 'PEPCO')->where('type', 'Residential')->get();
		
		foreach($pepco_plans as $plan){
			$this->assertEquals('PEPCO', $plan->ldc);
			$this->assertEquals('Residential', $plan->type);
		}
	}

	/** @test */
	public function return_plans_for_pepco_commercial(){
		$pepco_plans = \App\Models\Plan::where('ldc', 'PEPCO')->where('type', 'Commercial')->get();
		
		foreach($pepco_plans as $plan){
			$this->assertEquals('PEPCO', $plan->ldc);
			$this->assertEquals('Commercial', $plan->type);
		}
	}

	/** @test */
	public function return_plans_for_ppl_residential(){
		$ppl_plans = \App\Models\Plan::where('ldc', 'PPL')->where('type', 'Residential')->get();
		
		foreach($ppl_plans as $plan){
			$this->assertEquals('PPL', $plan->ldc);
			$this->assertEquals('Residential', $plan->type);
		}
	}

	/** @test */
	public function return_plans_for_ppl_commercial(){
		$ppl_plans = \App\Models\Plan::where('ldc', 'PPL')->where('type', 'Commercial')->get();
		
		foreach($ppl_plans as $plan){
			$this->assertEquals('PPL', $plan->ldc);
			$this->assertEquals('Commercial', $plan->type);
		}
	}

	/** @test */
    public function return_plans_for_duke_residential()
    {
     	$duke_plans = \App\Models\Plan::where('ldc', 'Duke')->where('type', 'Residential')->get();
     	
     	foreach($duke_plans as $plan){
     		$this->assertEquals('Duke', $plan->ldc);
     		$this->assertEquals('Residential', $plan->type);
     	}
    }

}
