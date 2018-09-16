import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { WelcomePage } from './welcome';

import { PipesModule } from '../../pipes/pipes.module';

@NgModule({
  declarations: [
    WelcomePage,
  ],
  imports: [
    IonicPageModule.forChild(WelcomePage),
	PipesModule
  ],
})
export class WelcomePageModule {}
