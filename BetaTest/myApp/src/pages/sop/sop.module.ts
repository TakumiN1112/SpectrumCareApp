import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { SopPage } from './sop';

@NgModule({
  declarations: [
    SopPage,
  ],
  imports: [
    IonicPageModule.forChild(SopPage),
  ],
})
export class SopPageModule {}
