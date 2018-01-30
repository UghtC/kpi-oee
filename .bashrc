# .bashrc

# User specific aliases and functions

alias rm='rm -i'
alias cp='cp -i'
alias mv='mv -i'
alias ls='ls -a --color=auto' 2>/dev/null
alias ll='ls -lah --color=auto' 2>/dev/null

## get rid of command not found ##
alias cd..='cd ..'
alias ..='cd ..'


## Colorize the grep command output for ease of use (good for log files)##
alias grep='grep --color=auto'
alias egrep='egrep --color=auto'
alias fgrep='fgrep --color=auto'

# Stop after sending count ECHO_REQUEST packets #
alias ping='ping -c 5'
# Do not wait interval 1 second, go fast #
alias fastping='ping -c 100 -s.2'



alias nagrestart='systemctl restart nagios.service'
alias nagcheck='/usr/local/nagios/bin/nagios -v /usr/local/nagios/etc/nagios.cfg'
alias naginfo='/usr/local/nagios/bin/nagios -s  /usr/local/nagios/etc/nagios.cfg'

#fortune | cowsay -np

# Source global definitions
if [ -f /etc/bashrc ]; then
	. /etc/bashrc
fi

# colourise

LS_COLORS='no=00;38;5;250:rs=0:di=01;38;5;198:ln=01;38;5;37:mh=00:pi=48;5;230;38;5;136;01:so=48;5;230;38;5;136;01:do=48;5;230;38;5;136;01:bd=48;5;230;38;5;244;01:cd=48;5;230;38;5;244;01:or=48;5;235;38;5;160:su=48;5;160;38;5;230:sg=48;5;136;38;5;230:ca=30;41:tw=48;5;64;38;5;230:ow=48;5;235;38;5;33:st=48;5;33;38;5;230:*.tar=01;31:*.tgz=01;31:*.arj=01;31:*.taz=01;31:*.lzh=01;31:*.zip=01;31:*.z=01;31:*.Z=01;31:*.gz=01;31:ex=01;38;5;82:*.cmd=00;38;5;82:*.exe=00;38;5;82:*.com=00;38;5;82:*.btm=00;38;5;82:*.bat=00;38;5;82:*.jpg=00;38;5;37:*.jpeg=00;38;5;37:*.png=00;38;5;37:*.gif=00;38;5;37:*.bmp=00;38;5;37:*.xbm=00;38;5;37:*.xpm=00;38;5;37:*.tif=00;38;5;37:*.tiff=00;38;5;37:*.pdf=00;38;5;98:*.odf=00;38;5;98:*.doc=00;38;5;98:*.ppt=00;38;5;98:*.pptx=00;38;5;98:*.db=00;38;5;98:*.aac=00;38;5;208:*.au=00;38;5;208:*.flac=00;38;5;208:*.mid=00;38;5;208:*.midi=00;38;5;208:*.mka=00;38;5;208:*.mp3=00;38;5;208:*.mpc=00;38;5;208:*.ogg=00;38;5;208:*.ra=00;38;5;208:*.wav=00;38;5;208:*.m4a=00;38;5;208:*.axa=00;38;5;208:*.oga=00;38;5;208:*.spx=00;38;5;208:*.xspf=00;38;5;208:*.mov=01;38;5;208:*.mpg=01;38;5;208:*.mpeg=01;38;5;208:*.3gp=01;38;5;208:*.m2v=01;38;5;208:*.mkv=01;38;5;208:*.ogm=01;38;5;208:*.mp4=01;38;5;208:*.m4v=01;38;5;208:*.mp4v=01;38;5;208:*.vob=01;38;5;208:*.qt=01;38;5;208:*.nuv=01;38;5;208:*.wmv=01;38;5;208:*.asf=01;38;5;208:*.rm=01;38;5;208:*.rmvb=01;38;5;208:*.flc=01;38;5;208:*.avi=01;38;5;208:*.fli=01;38;5;208:*.flv=01;38;5;208:*.gl=01;38;5;208:*.m2ts=01;38;5;208:*.divx=01;38;5;208:*.log=00;38;5;240:*.bak=00;38;5;240:*.aux=00;38;5;240:*.bbl=00;38;5;240:*.blg=00;38;5;240:*~=00;38;5;240:*#=00;38;5;240:*.part=00;38;5;240:*.incomplete=00;38;5;240:*.swp=00;38;5;240:*.tmp=00;38;5;240:*.temp=00;38;5;240:*.o=00;38;5;240:*.pyc=00;38;5;240:*.class=00;38;5;240:*.cache=00;38;5;240:';
export LS_COLORS


# PS1='\e[37;1m\u@\e[35m\W\e[0m\$ '   # this will change your prompt format

#magenta=$(tput setaf 5)
#white=$(tput setaf 7)
#green=$(tput setaf 2)
#reset=$(tput sgr0)

#PS1='\[$magenta\]\[\u\]\[$white\]\[@\]\[$green\]\[\W\]\$\[$reset\] '

export PS1="\[\033[38;5;177m\]\u\[$(tput sgr0)\]\[\033[38;5;15m\]@\[$(tput sgr0)\]\[\033[38;5;10m\]\h:\[$(tput sgr0)\]\[\033[38;5;6m\][\w]\[$(tput sgr0)\]\[\033[38;5;15m\]: \[$(tput sgr0)\]"


