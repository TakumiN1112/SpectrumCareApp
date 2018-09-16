import { Pipe, PipeTransform } from '@angular/core';
import {DomSanitizer} from '@angular/platform-browser';

/**
 * Generated class for the TesthtmlPipe pipe.
 *
 * See https://angular.io/api/core/Pipe for more info on Angular Pipes.
 */
@Pipe({
  name: 'testhtml',
})
export class TesthtmlPipe implements PipeTransform {
  /**
   * Takes a value and makes it lowercase.
   */
  constructor(private domSanitizer: DomSanitizer){}
    transform(html: string, args: any[]): any {
        return this.domSanitizer.bypassSecurityTrustResourceUrl(html);
  }
}
